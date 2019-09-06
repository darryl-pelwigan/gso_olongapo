<?php

namespace Modules\Inventory\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Inventory\Entities\GSOCategory as gsocodecat;
use Modules\Inventory\Entities\GSOItems as gsocodeitems;
use Modules\Inventory\Entities\PpeMnthlyReport;
use Modules\Inventory\Entities\PpeMnthlyReportItems;
use Session;
use Carbon\Carbon;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




class PPEMonthlyReportController extends Controller
{
    protected $data;
    protected $page_title = 'Login';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }



    public function index()
    {
        return view('inventory::ppe-mnthly.index',$this->setup());
    }

    public function get_all(Request $request){
          $get_ppe_mnthly = DB::table('olongapo_ppe_mnthly_report')
                                        ->join('olongapo_ppe_mnthly_report_items','olongapo_ppe_mnthly_report_items.ppe_mnthly_id','=','olongapo_ppe_mnthly_report.id')
                                        ->join('olongapo_employee_list','olongapo_employee_list.id','=','olongapo_ppe_mnthly_report_items.accountable_person')
                                        ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_ppe_mnthly_report.department')
                                        ->join('supplier_info','supplier_info.id','=','olongapo_ppe_mnthly_report_items.supplier')
                                        ->select(
                                                    'olongapo_ppe_mnthly_report.id as ppe_mnthly_id'
                                                    ,'olongapo_ppe_mnthly_report.date_log','olongapo_ppe_mnthly_report.inv_control_no','olongapo_ppe_mnthly_report.type'
                                                    ,'olongapo_ppe_mnthly_report_items.id as ppe_mnthly_items_id'
                                                    ,'olongapo_ppe_mnthly_report_items.item_desc','olongapo_ppe_mnthly_report_items.property_code','olongapo_ppe_mnthly_report_items.po_no'
                                                    ,'olongapo_ppe_mnthly_report_items.qty','olongapo_ppe_mnthly_report_items.unit_value','olongapo_ppe_mnthly_report_items.total_value','olongapo_ppe_mnthly_report_items.invoice'
                                                    ,db::raw('CONCAT(olongapo_employee_list.fname," ",olongapo_employee_list.mname," ",olongapo_employee_list.lname) as employee_name')
                                                    ,'olongapo_subdepartment.dept_desc'
                                                    ,'supplier_info.title','supplier_info.id'
                                                )
                                        ->get()
                                        ;

            $get_ppe_mnthly = PpeMnthlyReport::all();

        $dataArray = [];
        $po_no="";
        foreach ($get_ppe_mnthly as $key => $value) {
           // $po_no = $value->pono_id ? $value->pr_no->pr_orderno->po_no : '';
           $po_no = $value->po_no;
           $employee_name = '';
            foreach ($value->inv_items as $key => $inv_item) {
                $employee_name = $inv_item->accountable_person ? $inv_item->accountable->lname.', '.$inv_item->accountable->fname : '';
                $suplier = $inv_item->supplier ? $inv_item->supplier_info->title : "" ;
                $dataArray[] =   array(
                                        $value->date_log,
                                        $value->inv_control_no,
                                        $inv_item->item_desc,
                                        $inv_item->property_code,
                                        $po_no,
                                        $inv_item->qty,
                                        $inv_item->unit_value,
                                        $inv_item->total_value,
                                        $employee_name,
                                        $suplier,
                                        $inv_item->invoice,
                                        $value->inv_dept->dept_desc,
                                        '<a class="btn btn-sm btn-info" href="'.route('inventory.edit_ppe_pr',$value->id).'" >edit</a> '
                                    );

            }
        }

        // for($x=0;$x<count($get_ppe_mnthly);$x++){
        //     $dataArray[$x] =   array(
        //                                 $get_ppe_mnthly[$x]->date_log,
        //                                 $get_ppe_mnthly[$x]->inv_control_no,
        //                                 $get_ppe_mnthly[$x]->item_desc,
        //                                 $get_ppe_mnthly[$x]->property_code,
        //                                 $get_ppe_mnthly[$x]->po_no,
        //                                 $get_ppe_mnthly[$x]->qty,
        //                                 $get_ppe_mnthly[$x]->unit_value,
        //                                 $get_ppe_mnthly[$x]->total_value,
        //                                 $get_ppe_mnthly[$x]->employee_name,
        //                                 $get_ppe_mnthly[$x]->title,
        //                                 $get_ppe_mnthly[$x]->invoice,
        //                                 $get_ppe_mnthly[$x]->dept_desc,
        //                                 '<a class="btn btn-sm btn-info" href="'.route('inventory.edit_ppe_pr',$get_ppe_mnthly[$x]->ppe_mnthly_id).'" >edit</a> '
        //                             );

        // }

        $data['tbody'] =  $dataArray;
        return view('inventory::ppe-mnthly.ajax-content/ppe_mnthly_data',$data);
    }

    public function set_ppe_mnthly_control_no(Request $request){
        $dt = new Carbon($request->input('date_log'));
        $control_no = db::table('olongapo_ppe_mnthly_report')
                                ->whereYear('date_log','=',$dt->format('Y'))
                                ->whereMonth('date_log','=',$dt->format('m'))
                                ->where('type','=',$request->input('type_es'))
                                ->get();
            $control_no_counter = sprintf("%04d", $control_no->count()+1);
           if($request->input('type_es') === 'Equipement'){
                $control_nox = 'E-'.$dt->format('y').$dt->format('m').'-'.$control_no_counter;
           }else{
                $control_nox = 'S-'.$dt->format('y').$dt->format('m').'-'.$control_no_counter;
           }

        return $control_nox;
    }

    public function set_ppe_mnthly_report(Request $request){
         $validator = Validator::make($request->all(), [
                    'date_log' => 'required|date',
                    'pr_sdept_id' => 'required',
                    'item_desc' => 'required',
                    'control_no' => 'required',
            ],[
                   'date_log.required' => 'The DATE LOG is required.',
                   'pr_sdept_id.required' => 'The Department is required.',
                   'item_desc.required' => 'The Item Description is required.',
                   'control_no.required' => 'Control Number is required.'
            ]);
        if($validator->fails()){


            }else{
                $data['status'] = 1;
                $data['errors'] = 'PPE MNTHLY REPORT SAVE';

                // $PpeMnthlyReport = new PpeMnthlyReport;
                // $PpeMnthlyReport->date_log = $request->input('date_log');
                // $PpeMnthlyReport->inv_control_no  = $request->input('control_no');
                // $PpeMnthlyReport->type  = $request->input('type_es');
                // $PpeMnthlyReport->department  = $request->input('pr_sdept_id');
                // $PpeMnthlyReport->save();


            }
            $data['errors'] = count($request->input('item_desc'));
        return $data;
    }

    public function monthly_report_new(){
        return view('inventory::ppe-mnthly.new',$this->setup());
    }


    public function save_monthly_report_new(Request $request){
            $validator = Validator::make($request->all(), [
                    'date_log' => 'required|date',
                    'pr_sdept_id' => 'required',
                    'item_desc' => 'required',
                    'control_no' => 'required',
            ],[
                   'date_log.required' => 'The DATE LOG is required.',
                   'pr_sdept_id.required' => 'The Department is required.',
                   'item_desc.required' => 'The Item Description is required.',
                   'control_no.required' => 'Control Number is required.'
            ]);
        if($validator->fails()){
                return back()->withErrors($validator)
                ->withInput();


            }else{
                 Session::flash('info', ['PPE montly saved']);

                $PpeMnthlyReport = new PpeMnthlyReport;
                $PpeMnthlyReport->date_log = $request->input('date_log');
                $PpeMnthlyReport->inv_control_no  = $request->input('control_no');
                $PpeMnthlyReport->type  = $request->input('type_es');
                $PpeMnthlyReport->department  = $request->input('pr_sdept_id');
                $PpeMnthlyReport->po_no  = $request->input('item_pono');
                $PpeMnthlyReport->pono_id  = $request->input('item_poid');
                $PpeMnthlyReport->save();
                $datax = [];
                for($c = 0 ; $c < count($request->input('item_desc')); $c++){

                    $datax[] = [
                                            'ppe_mnthly_id'                   => $PpeMnthlyReport->id,
                                            'prno_item_id'                    =>  ($request->input('item_id.'.$c)) ? $request->input('item_id.'.$c) : null,
                                            'item_desc'                           =>  $request->input('item_desc.'.$c),
                                            'property_code'                  => $request->input('item_property_code.'.$c),
                                            'po_no'                                   =>  $request->input('item_pono'),
                                            'unit'                                     => $request->input('item_unit.'.$c),
                                            'qty'                                       => $request->input('item_qty.'.$c),
                                            'unit_value'                          => $request->input('item_qty.'.$c),
                                            'total_value'                        =>  $request->input('item_qty.'.$c) * $request->input('item_qty.'.$c),
                                            'accountable_person'        => $request->input('item_accountable_person_id.'.$c),
                                            'supplier'                              =>  $request->input('item_supplier_id'),
                                            'department'                      => $request->input('pr_sdept_id'),
                                            'invoice'                               => $request->input('item_invoice.'.$c),
                                            'location'                               => $request->input('item_loc.'.$c),
                                            'depreciable'                               => $request->input('item_dep.'.$c),
                                    ];
                }
                $PpeMnthlyReport->inv_items()->insert($datax);
                 return redirect()->route('inventory.ppe');

            }

    }

     public function generate_report(){
        return view('inventory::ppe-mnthly.generate',$this->setup());
    }

    public function generate_report_pdf(Request $request){

        // return view('inventory::ppe-mnthly.generate',$this->setup());
        // $this->data['approved_by'] = Requestordersignee::where('deleted_at','=',null)->get();

        // $this->data['requested_by'] = DB::table('olongapo_purchase_request_no')
        //                             ->join('olongapo_employee_list', 'olongapo_purchase_request_no.requested_by', '=', 'olongapo_employee_list.id')
        //                             ->leftjoin('olongapo_position', 'olongapo_position.id', '=', 'olongapo_employee_list.position_id')
        //                             ->select([
        //                                 'olongapo_employee_list.fname',
        //                                 'olongapo_employee_list.lname',
        //                                 'olongapo_employee_list.mname',
        //                                 'olongapo_position.title'
        //                             ])
        //                             ->where('olongapo_purchase_request_no.id', '=', $request->input('pr_id') )
        //                             ->first();

         // $get_ppe_mnthly = DB::table('olongapo_ppe_mnthly_report')
         //                            ->join('olongapo_ppe_mnthly_report_items','olongapo_ppe_mnthly_report_items.ppe_mnthly_id','=','olongapo_ppe_mnthly_report.id')
         //                            ->join('olongapo_employee_list','olongapo_employee_list.id','=','olongapo_ppe_mnthly_report_items.accountable_person')
         //                            ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_ppe_mnthly_report.department')
         //                            ->join('supplier_info','supplier_info.id','=','olongapo_ppe_mnthly_report_items.supplier')

         //                            ->select(
         //                                        'olongapo_ppe_mnthly_report.id as ppe_mnthly_id'
         //                                        ,'olongapo_ppe_mnthly_report.date_log','olongapo_ppe_mnthly_report.inv_control_no','olongapo_ppe_mnthly_report.type'
         //                                        ,'olongapo_ppe_mnthly_report_items.id as ppe_mnthly_items_id'
         //                                        ,'olongapo_ppe_mnthly_report_items.item_desc','olongapo_ppe_mnthly_report_items.property_code','olongapo_ppe_mnthly_report_items.po_no'
         //                                        ,'olongapo_ppe_mnthly_report_items.qty','olongapo_ppe_mnthly_report_items.unit_value','olongapo_ppe_mnthly_report_items.total_value','olongapo_ppe_mnthly_report_items.invoice'
         //                                        ,db::raw('CONCAT(olongapo_employee_list.fname," ",olongapo_employee_list.mname," ",olongapo_employee_list.lname) as employee_name')
         //                                        ,'olongapo_subdepartment.dept_desc'
         //                                        ,'supplier_info.title','supplier_info.id'
         //                                    )
         //                            ->get()
         //                            ;


        $get_ppe_mnthly = PpeMnthlyReport::where('olongapo_ppe_mnthly_report.date_log','>=',$request->from)
        ->where('olongapo_ppe_mnthly_report.date_log','<=',$request->to)
        ->get();


        $dataArray = [
            ['DATE', 'CONTROL #', 'DESCRIPTION', 'PROPERTY CODE', 'CATEGORY', 'PO#', 'QTY', 'UNIT VALUE', 'TOTAL VALUE', 'ACOUNTABLE PERSON', 'DEPARTMENT', 'SUPPLIER', 'INVOICE']
                    ];
        foreach ($get_ppe_mnthly as $key => $value) {
           $po_no = $value->pono_id ? $value->pr_no->pr_orderno->po_no : '';
           $category = $value->type ? $value->type:'';
           $employee_name = '';
            foreach ($value->inv_items as $key => $inv_item) {
                $employee_name = $inv_item->accountable_person ? $inv_item->accountable->lname.', '.$inv_item->accountable->fname : '';
                $supplier = $inv_item->supplier ? $inv_item->supplier_info->title : "" ;
                $department = $inv_item->department ? $inv_item->department : '';
                $res = $inv_item->unit_value * 0.1;
                $dep=0;
                if($inv_item->est_life){
                     $dep = ($inv_item->unit_value - $res)/$inv_item->est_life;
                }

                $dataArray[] =   array(
                                        $value->date_log,
                                        $value->inv_control_no,
                                        $inv_item->item_desc,
                                        $inv_item->property_code,
                                        $category,
                                        $po_no,
                                        $inv_item->qty,
                                        $inv_item->unit_value,
                                        $inv_item->total_value,
                                        $employee_name,
                                        $department,
                                        $supplier,
                                        $inv_item->invoice,
                                    );

            }
        }



        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray(
        $dataArray,  // The data to set
        'A1'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
        );

        $writer = new Xlsx($spreadsheet);
        $writer->save('excel/PPE_Report.xlsx');


        return response()->download('excel/PPE_Report.xlsx');

    }


    public function update_monthly_report_new(Request $request){
        $request->input('item_loc');
            $validator = Validator::make($request->all(), [
                    'date_log' => 'required|date',
                    'pr_sdept_id' => 'required',
                    'item_desc' => 'required',
                    'control_no' => 'required',
            ],[
                   'date_log.required' => 'The DATE LOG is required.',
                   'pr_sdept_id.required' => 'The Department is required.',
                   'item_desc.required' => 'The Item Description is required.',
                   'control_no.required' => 'Control Number is required.'
            ]);
        if($validator->fails()){
                return back()->withErrors($validator)
                ->withInput();


            }else{
                 Session::flash('info', ['PPE montly saved']);

                $PpeMnthlyReport = PpeMnthlyReport::find($request->pmi_id);
                $PpeMnthlyReport->date_log = $request->input('date_log');
                $PpeMnthlyReport->inv_control_no  = $request->input('control_no');
                $PpeMnthlyReport->type  = $request->input('type_es');
                $PpeMnthlyReport->department  = $request->input('pr_sdept_id');
                $PpeMnthlyReport->save();

                foreach ($request['item_id'] as $key => $input_id) {

                    $item = PpeMnthlyReportItems::find($input_id);

                    $item->update(
                            [
                                 'item_desc'                           =>  $request->input('item_desc.'.$key),
                                 'property_code'                  => $request->input('item_property_code.'.$key),
                                 'accountable_person'        => $request->input('item_accountable_person_id.'.$key),
                                 'invoice'        => $request->input('item_invoice.'.$key),
                                 'location'        => $request->input('item_loc.'.$key),
                                 'depreciable'        => $request->input('item_dep.'.$key),
                                 'po_no'                                   =>  $request->input('item_pono'),
                            ]
                    );

                }
                 return back();

            }

    }

}
