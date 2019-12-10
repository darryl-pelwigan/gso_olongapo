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
use Modules\Inventory\Entities\PPEsubcode;
use Modules\Inventory\Entities\InventoryItems;
use Modules\Inventory\Entities\InventoryInfo;
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
                 Session::flash('info', ['PPE monthly saved']);

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
                                            // 'account_group'                  => $request->input('item_account_code.'.$c),
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
                                            // 'depreciable'                               => $request->input('item_dep.'.$c),
                                    ];
                }
                $PpeMnthlyReport->inv_items()->insert($datax);


                for($c = 0 ; $c < count($request->input('item_desc')); $c++){

                    $account_group = DB::table('inv_gsoprop_code_list')
                        ->where('inv_gsoprop_code_list.gsocode_cat_id', '=', substr($request->input('item_property_code.'.$c),3,1))
                        ->where('inv_gsoprop_code_list.code_no', '=',  substr($request->input('item_property_code.'.$c),4,1))
                        ->get()
                        ->first();

                    $inv_items= InventoryItems::where('inventory_items.item_code', '=', $account_group->id)
                            ->get()
                            ->first();

                    if(isset($inv_items)){

                        $datay[] = [

                                            'item_desc'                           =>  $account_group->desc,
                                            'item_qty'                           => $request->input('item_qty.'.$c)+$inv_items->item_qty,
                                            'item_code'                                       => $account_group->id,
                                ];
                        $inv_items->update($datay);

                    } else{

                        $inv_items = new InventoryItems;
                            $datay[] = [

                                            'item_desc'                           =>  $account_group->desc,
                                            'item_qty'                                       => $request->input('item_qty.'.$c),
                                            'item_code'                                       => $account_group->id,
                                ];
                        $inv_items->insert($datay);
                    }
                }

                 return redirect()->route('inventory.ppe');

            }

    }

     public function generate_report(){
        $this->data['employee'] = DB::table('olongapo_employee_list')->select('id','fname','mname','lname')->get();
        // $this->data['department'] = DEPTsubcode::all();
        return view('inventory::ppe-mnthly.generate',$this->setup());
    }

    public function generate_monthly_report_pdf(Request $request){

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
        // ob_clean();
        $get_ppe_mnthly = PpeMnthlyReport::where('olongapo_ppe_mnthly_report.date_log','>=',$request->from)
        ->where('olongapo_ppe_mnthly_report.date_log','<=',$request->to)
        ->get();
        // dd($get_ppe_mnthly);
          $dataArray = [
            ['DATE', 'CONTROL #', 'DESCRIPTION', 'PROPERTY CODE', 'CATEGORY', 'PO#', 'QTY', 'UNIT VALUE', 'TOTAL VALUE', 'ACOUNTABLE PERSON', 'DEPARTMENT', 'SUPPLIER', 'INVOICE']
                    ];

         $prepared_det = DB::table('olongapo_employee_list')
                    ->join('olongapo_department' , 'olongapo_department.dept_code','=','olongapo_employee_list.dept_id')
                    ->where('olongapo_employee_list.id', '=',  $request->input('prepared'))
                    ->get()
                    ->first();

         $reviewed_det = DB::table('olongapo_employee_list')
                    ->join('olongapo_department' , 'olongapo_department.dept_code','=','olongapo_employee_list.dept_id')
                    ->where('olongapo_employee_list.id', '=',  $request->input('reviewed'))
                    ->get()
                    ->first();

         $noted_det = DB::table('olongapo_employee_list')
                    ->join('olongapo_department' , 'olongapo_department.dept_code','=','olongapo_employee_list.dept_id')
                    ->where('olongapo_employee_list.id', '=',  $request->input('noted'))
                    ->get()
                    ->first();

         $endorsed_det = DB::table('olongapo_employee_list')
                    ->join('olongapo_department' , 'olongapo_department.dept_code','=','olongapo_employee_list.dept_id')
                    ->where('olongapo_employee_list.id', '=',  $request->input('endorsed'))
                    ->get()
                    ->first();
        // dd($prepared_det);
        // dd($request->input('prepared'));

        $i = 0;
        for($mnth = Carbon::parse($request->from); $mnth->format('m') <= Carbon::parse($request->to)->format('m'); $mnth->addMonth()) {
            $dataArray[$mnth->format('F')] = [];

            foreach ($get_ppe_mnthly as $key => $value) {
                $po_no = $value->pono_id ? $value->pr_no->pr_orderno->po_no : '';

                $category = $value->type ? $value->type:'';
                $employee_name = '';
                foreach ($value->inv_items as $key2 => $inv_item) {
                    $employee_name = $inv_item->accountable_person ? $inv_item->accountable->lname.', '.$inv_item->accountable->fname : '';
                    $supplier = $inv_item->supplier ? $inv_item->supplier_info->title : "" ;
                    // $department = $inv_item->accountable_person ? $inv_item->accountable->lname.', '.$inv_item->accountable->fname : '';
                    $res = $inv_item->unit_value * 0.1;
                    $dep=0;
                    if($inv_item->est_life){
                        $dep = ($inv_item->unit_value - $res)/$inv_item->est_life;
                    }

                    if(strcasecmp(Carbon::parse($value->date_log)->format('F'), $mnth->format('F')) == 0) {
                        $dataArray[$mnth->format('F')][$i] = array(
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
                                $inv_item->location,
                                $supplier,
                                $inv_item->invoice,
                            );
                        $i++;
                    } /*else {
                        // reset month
                        $mnth = $mnth->addMonth();
                        $i = 0;
                    }*/
                }
            }
            // if(strcasecmp(Carbon::parse($value->date_log)->format('F'), $mnth->format('F')) != 0) {
            //     $mnth = $mnth->addMonth();
            //     $i = 0;
            // }
        }

        $spreadsheet = new Spreadsheet();

        // month per sheet

        foreach($dataArray as $key => $value) {
            $excel_rows = count($value);
            if(gettype($key) == "string" && $excel_rows > 0) {
                $new_sheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $key);
                $spreadsheet->addSheet($new_sheet, $spreadsheet->getSheetCount()+1);

                $sheet = $spreadsheet->getSheetByName($key);

                $sheet->fromArray(
                    $value,  // The data to set
                    null,    // Top left coordinate of the worksheet range where
                    'A5'     //    we want to set these values (default is A1)
                );

                $sheet->fromArray(
                    $dataArray[0],  // headers
                    null,
                    'A4'
                );

            // STYLES
            $excel_rows += 4; // num of rows for heading....
            $style_array1 = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => array('argb' => '000000'),
                    ),
                ),
            );
            $style_array2 = array(
                'borders' => array(
                    'left' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => array('argb' => '000000'),
                    ),
                ),
            );
            $style_array3 = array(
                'borders' => array(
                    'right' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => array('argb' => '000000'),
                    ),
                ),
            );
            $style_array4 = array(
                'borders' => array(
                    'bottom' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => array('argb' => '000000'),
                    ),
                ),
            );
            $style_array_gen = array( // general
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => '000000'),
                    ),
                    'bottom' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => '000000'),
                    ),
                    'left' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => '000000'),
                    ),
                    'right' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => '000000'),
                    ),
                ),
            );


            foreach (range('A','M') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
            // header
            $sheet->mergeCells('D1:G1');
            $sheet->mergeCells('D2:G2');
            $sheet->setCellValue('D1', 'PPE MONTHLY REPORT');
            $sheet->setCellValue('D2', Carbon::parse($key)->startOfMonth()->format('F d').'-'.Carbon::parse($key)->endOfMonth()->format('F d'));
            $sheet->getStyle('D1:G1')->getFont()->setBold(true);
            $sheet->getStyle('D2:G2')->getFont()->setBold(true);
            $sheet->getStyle('A4:M4')->getFont()->setBold(true);
            $sheet->getStyle('A4:M4')->getAlignment()->setHorizontal('center');

            // signatories
            $sign_row_label = $excel_rows+3;
            $sign_row_name = $excel_rows+6;
            $sign_row_position = $excel_rows+7;
            $sheet->mergeCells('A'.$sign_row_label.':B'.$sign_row_label);
            $sheet->mergeCells('C'.$sign_row_label.':D'.$sign_row_label);
            $sheet->mergeCells('E'.$sign_row_label.':F'.$sign_row_label);
            $sheet->mergeCells('G'.$sign_row_label.':I'.$sign_row_label);
            $sheet->setCellValue('A'.$sign_row_label, 'Prepared By: ');
            $sheet->setCellValue('C'.$sign_row_label, 'Reviewed By: ');
            $sheet->setCellValue('E'.$sign_row_label, 'Noted By: ');
            $sheet->setCellValue('G'.$sign_row_label, 'Endorsed To: ');
            $sheet->setCellValue('A'.$sign_row_name, $prepared_det->fname.' '.$prepared_det->mname.' '.$prepared_det->lname);
            $sheet->setCellValue('C'.$sign_row_name, $reviewed_det->fname.' '.$reviewed_det->mname.' '.$reviewed_det->lname);
            $sheet->setCellValue('E'.$sign_row_name, $noted_det->fname.' '.$noted_det->mname.' '.$noted_det->lname);
            $sheet->setCellValue('G'.$sign_row_name, $endorsed_det->fname.' '.$endorsed_det->mname.' '.$endorsed_det->lname);
            $sheet->setCellValue('A'.$sign_row_position, $prepared_det->dept_desc);
            $sheet->setCellValue('C'.$sign_row_position, $reviewed_det->dept_desc);
            $sheet->setCellValue('E'.$sign_row_position, $noted_det->dept_desc);
            $sheet->setCellValue('G'.$sign_row_position, $endorsed_det->dept_desc);
            $sheet->getStyle('A'.$sign_row_label.':I'.$sign_row_label)->getAlignment()->setHorizontal('center');

            $columns = ['A','B','C','D','E','F','G','H','I','J','K','L','M'];
            for($i = 0; $i < count($columns); $i++) {
                for($j = 4; $j <= $excel_rows; $j++) {
                    $sheet->getStyle($columns[$i].$j)->applyFromArray($style_array_gen);
                }
            }

            $sheet->getStyle('A4:M4')->applyFromArray($style_array4);
            $sheet->getStyle('A4:M4')->applyFromArray($style_array2);
            $sheet->getStyle('A4:M4')->applyFromArray($style_array1);
            $sheet->getStyle('A4:A'.$excel_rows)->applyFromArray($style_array2);
            $sheet->getStyle('M4:M'.$excel_rows)->applyFromArray($style_array3);
            $sheet->getStyle('A'.$excel_rows.':M'.$excel_rows)->applyFromArray($style_array4);
            $sheet->getStyle('D1:G1')->getAlignment()->setHorizontal('center');
            $sheet->getStyle('D2:G2')->getAlignment()->setHorizontal('center');
            $sheet->getStyle('D2:G2')->getAlignment()->setHorizontal('center');
            $sheet->getStyle('A5:F'.$excel_rows)->getAlignment()->setHorizontal('left');
            $sheet->getStyle('G5:I'.$excel_rows)->getAlignment()->setHorizontal('right');
            $sheet->getStyle('A5:F'.$excel_rows)->getAlignment()->setHorizontal('left');
            $sheet->getStyle('J5:K'.$excel_rows)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('L5:M'.$excel_rows)->getAlignment()->setHorizontal('left');
            // END STYLES

            // $sheet->fromArray(
            //     $dataArray,  // The data to set
            //     null,        // Top left coordinate of the worksheet range where
            //     'A4'         //    we want to set these values (default is A1)
            // );
            }
        }

        // $empty_sheet = $spreadsheet->getIndex($spreadsheet->getSheetByName('Worksheet'));
        // $spreadsheet->removeSheetByIndex($empty_sheet);

        $writer = new Xlsx($spreadsheet);
        $writer->save('excel/PPEMNHTLYReport.xlsx');


        return response()->download('excel/PPEMNHTLYReport.xlsx');

    }

     public function generate_yearly_report_pdf(Request $request){

        $get_ppe = PpeMnthlyReport::whereYear('olongapo_ppe_mnthly_report.date_log','=', $request->from)
        ->get();

        //account group
        $get_codes = PPEsubcode::all();
        foreach ($get_codes as $codes){
            $codesArray[$codes->code_family]=$codes->desc.' ('.$codes->code_coa.') Code '.$codes->code_family;
        }

        $ao_det = DB::table('olongapo_employee_list')
                    ->join('olongapo_department' , 'olongapo_department.dept_code','=','olongapo_employee_list.dept_id')
                    ->where('olongapo_employee_list.id', '=',  $request->input('ao'))
                    ->get()
                    ->first();
        // dd($ao_det);
        // headerArray
        $headerArray = [
            ['GSO', 'ACCOUNT ', 'DESCRIPTION', 'Estimated ', 'Date ', 'ACCOUNTABLE ', '(Exact Location,', 'Depriciable', 'UNIT', 'Balance per card',' ', 'Shortage', ' ', 'ACCUMULATED', 'RESIDUAL'],
            ['Property Code', 'GROUP', NULL, 'Life Years', 'Acquired','OFFICER', 'conditions, etc.)', '(I/O)','VALUE', 'Qty', 'Value', 'Qty', 'Total Value', 'DEPRECIATION', 'VALUE'],
                    ];
        // dd($get_ppe);

        //Inventory items population
        foreach ($get_ppe as $key => $value) {
                $po_no = $value->pono_id ? $value->pr_no->pr_orderno->po_no : '';

                $category = $value->type ? $value->type:'';
                $employee_name = '';

                foreach ($value->inv_items as $key2 => $inv_item) {

                    $employee_name = $inv_item->accountable_person ? $inv_item->accountable->lname.', '.$inv_item->accountable->fname : '';
                    $supplier = $inv_item->supplier ? $inv_item->supplier_info->title : "" ;



                    $account_group = DB::table('inv_gsoprop_code_list')
                    ->where('inv_gsoprop_code_list.gsocode_cat_id', '=', substr($inv_item->property_code,3,1))
                    ->where('inv_gsoprop_code_list.code_no', '=',  substr($inv_item->property_code,4,1))
                    ->get()
                    ->first();

                    // dd($account_group);
                    $est_life = $account_group ? $account_group->useful_life : "" ;
                    $depreciable = $account_group->useful_life ? 'I':'O';
                    $res = $inv_item->unit_value * 0.1;

                    $dep=0;

                    if($est_life){
                        $dep = ($inv_item->unit_value - $res)/$est_life;
                    }

                    foreach($codesArray as $codes => $codeValue){

                        $invCode = substr($inv_item->property_code,0,2);

                        if($invCode == $codes){

                              $itemsArray[$codeValue][] =
                               array(
                                $inv_item->property_code,
                                $account_group->desc,
                                $inv_item->item_desc,
                                $est_life,
                                $value->date_log,
                                $employee_name,
                                $inv_item->location,
                                $depreciable,
                                $inv_item->unit_value,
                                $inv_item->qty,
                                $inv_item->unit_value*$inv_item->qty,
                                " ",
                                " ",
                                $dep,
                                $res
                                );
                        }
                    }
                }
            }

        //sort inventory items according to account group
        array_multisort(array_map(function($element) {
            return $element[0];
        }, $itemsArray), SORT_ASC, $itemsArray);


        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()
                    ->fromArray(
                    $headerArray, //header
                    NULL,        // Array values with this value will not be set
                    'A8'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
        );

        $spreadsheet->getActiveSheet()->setCellValue('A1', 'INVENTORY OF EQUIPMENT');
        $spreadsheet->getActiveSheet()->setCellValue('A3', 'Made as of '.Carbon::now()->format('F Y'));
        $spreadsheet->getActiveSheet()->setCellValue('A5', 'For which');
        $spreadsheet->getActiveSheet()->setCellValue('B5',  $ao_det->fname.' '.$ao_det->mname.' '.$ao_det->lname);
        $spreadsheet->getActiveSheet()->setCellValue('C5',  $ao_det->dept_desc);
        $spreadsheet->getActiveSheet()->setCellValue('D5',  $request->bureau.' is accountable having assumed such acountability on');
        $spreadsheet->getActiveSheet()->setCellValue('B6', '(Name of Accountable Officer)');
        $spreadsheet->getActiveSheet()->setCellValue('C6', '(Official designation)');
        $spreadsheet->getActiveSheet()->setCellValue('D6', '(Bureau office)');


        //cell number
        $i=10;

        foreach($itemsArray as $items =>$value){

            $spreadsheet->getActiveSheet()
                    ->setCellValue('A'.$i, $items);

            $spreadsheet->getActiveSheet()
                    ->getStyle('A'.$i)
                    ->getFont()
                    ->setSize(16);

            $i++;
            $spreadsheet->getActiveSheet()
                    ->fromArray(
                    $value,
                    NULL,        // Array values with this value will not be set
                    'A'.$i         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
            );
            $i=$i+count($value);
        }


        //styles

        $spreadsheet->getActiveSheet()->mergeCells('C8:C9');
        $spreadsheet->getActiveSheet()->mergeCells('J8:K8');
        $spreadsheet->getActiveSheet()->mergeCells('L8:M8');
        $spreadsheet->getActiveSheet()->getStyle('A8:O9')
                    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $spreadsheet->getActiveSheet()->getStyle('A8:O9')
                    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $spreadsheet->getActiveSheet()->getStyle('A8:O9')
                    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $spreadsheet->getActiveSheet()->getStyle('A8:O9')
                    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        // $empty_sheet = $spreadsheet->getIndex($spreadsheet->getSheetByName('Worksheet'));
        // $spreadsheet->removeSheetByIndex($empty_sheet);
         foreach (range('A','O') as $col) {
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }

        //save
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
                 Session::flash('info', ['PPE monthly saved']);

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
                                 'account_group'        => $request->input('item_account_code.'.$key),
                                 // 'depreciable'        => $request->input('item_dep.'.$key),
                                 'po_no'                                   =>  $request->input('item_pono'),
                            ]
                    );

                    $account_group = DB::table('inv_gsoprop_code_list')
                    ->where('inv_gsoprop_code_list.gsocode_cat_id', '=', substr($request->input('item_property_code.'.$key),3,1))
                    ->where('inv_gsoprop_code_list.code_no', '=',  substr($request->input('item_property_code.'.$key),4,1))
                    ->get()
                    ->first();

                    $inv= InventoryItems::where('inventory_items.item_code', '=', $account_group->id)
                            ->get()
                            ->first();
                    if(isset($inv)){
                        $datay[] = [
                                    'id'                                     =>  $account_group->desc,
                                    'item_desc'                           =>  $account_group->desc,
                                    'item_qty'                                       => $request->input('item_qty.'.$key),
                                    'item_code'                                       => $account_group->id,
                                ];
                        $inv->update($datay);
                    }else{
                        $inv=new InventoryItems;
                        $datay[] = [
                                    'id'                                     =>  $account_group->desc,
                                    'item_desc'                           =>  $account_group->desc,
                                    'item_qty'                                       => $request->input('item_qty.'.$key),
                                    'item_code'                                       => $account_group->id,
                                ];
                        $inv->update($datay);
                    }

                }

                 return back();

            }

    }

}
