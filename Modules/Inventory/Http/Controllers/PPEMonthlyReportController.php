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
                                                $tbody = '';
        $dataArray = [];

               for($x=0;$x<count($get_ppe_mnthly);$x++){
                        $dataArray[$x] =   array(
                                                    $get_ppe_mnthly[$x]->date_log,
                                                    $get_ppe_mnthly[$x]->inv_control_no,
                                                    $get_ppe_mnthly[$x]->item_desc,
                                                    $get_ppe_mnthly[$x]->property_code,
                                                    $get_ppe_mnthly[$x]->po_no,
                                                    $get_ppe_mnthly[$x]->qty,
                                                    $get_ppe_mnthly[$x]->unit_value,
                                                    $get_ppe_mnthly[$x]->total_value,
                                                    $get_ppe_mnthly[$x]->employee_name,
                                                    $get_ppe_mnthly[$x]->dept_desc,
                                                    $get_ppe_mnthly[$x]->title,
                                                    $get_ppe_mnthly[$x]->invoice,
                                                    '<a class="btn btn-sm btn-info" href="'.route('inventory.set_ppe_pr',$get_ppe_mnthly[$x]->ppe_mnthly_id).'" >edit</a> '
                                                );

        }
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
                $PpeMnthlyReport->save();
                $datax = [];
                for($c = 0 ; $c < count($request->input('item_desc')); $c++){
                    $datax[] = [
                                            'ppe_mnthly_id'                   => $PpeMnthlyReport->id,
                                            'item_desc'                           =>  $request->input('item_desc.'.$c),
                                            'property_code'                  => $request->input('item_property_code.'.$c),
                                            'po_no'                                   =>  $request->input('item_pono'),
                                             'unit'                                     => $request->input('item_unit.'.$c),
                                            'qty'                                       => $request->input('item_qty.'.$c),
                                            'unit_value'                          => $request->input('item_qty.'.$c),
                                            'total_value'                        =>  $request->input('item_qty.'.$c) * $request->input('item_qty.'.$c),
                                            'accountable_person'        => $request->input('item_accountable_person_id.'.$c),
                                            'department'                      => $request->input('pr_sdept_id'),
                                            'supplier'                              =>  $request->input('item_supplier_id'),
                                            'invoice'                               => $request->input('item_invoice.'.$c),
                                    ];
                }
                $PpeMnthlyReport->inv_items()->insert($datax);
                 return back();

            }

    }

}
