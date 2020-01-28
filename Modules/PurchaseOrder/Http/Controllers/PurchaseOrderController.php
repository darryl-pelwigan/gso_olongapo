<?php

namespace Modules\PurchaseOrder\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\PurchaseOrder\Entities\{PurchaseOrderNo,PurchaseOrderItems,PurchaseOrderRequisition,PurchaseOrderAcceptance};
use Modules\Employee\Entities\{Employee};

use Illuminate\Support\Facades\Crypt;
use PDF, Excel;
use PHPExcel_Worksheet_Drawing;
use Input;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class PurchaseOrderController extends Controller
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
        return view('purchaseorder::purchase-order.purchase-order',$this->setup());
    }

     public function no_po()
    {
        $this->data['templatex'] = DB::table('olongapo_bac_template')->select('id','template_desc','code')->get();
        return view('purchaseorder::purchase-order.wout-purchase-order',$this->setup());
    }

    public function anyData()
    {
        $items = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                            ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->join('supplier_info' , 'supplier_info.id','=','olongapo_purchase_request_items.supplier_id')
                            ->leftjoin('olongapo_purchase_order_no' , 'olongapo_purchase_order_no.prno_id','=','olongapo_purchase_request_items.prno_id')
                            ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty', 'olongapo_purchase_request_items.pr_total',
                                    'olongapo_purchase_request_items.supplier_id','supplier_info.title',
                                    'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_no as prno_count',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code',
                                    ])
                            ->where('olongapo_purchase_order_no.id','=',null);
        return Datatables::of($items)->make(true);
    }

    public function pr_list()
    {
        $items = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                            ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->join('supplier_info' , 'supplier_info.id','=','olongapo_purchase_request_items.supplier_id')
                            ->join('olongapo_purchase_order_no' , 'olongapo_purchase_order_no.prno_id','=','olongapo_purchase_request_no.id')
                            ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty', 'olongapo_purchase_request_items.pr_total',
                                    'olongapo_purchase_request_items.supplier_id','supplier_info.title',
                                    'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_no as prno_count',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.dept_desc',
                                    'olongapo_purchase_order_no.po_date','olongapo_purchase_order_no.id as pono_id',
                            ]);


        return Datatables::of($items)->make(true);
    }


    public function get_request_po(Request $request){
         $items = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_purchase_order_no' , 'olongapo_purchase_order_no.prno_id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_order_no.dept_id','=','olongapo_subdepartment.id')
                            ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->join('supplier_info' , 'supplier_info.id','=','olongapo_purchase_request_items.supplier_id')
                            ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty', 'olongapo_purchase_request_items.pr_total','olongapo_purchase_request_items.obr_date','olongapo_purchase_request_items.obr_no',
                                    'olongapo_purchase_request_items.supplier_id','supplier_info.title',
                                    'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_no',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.desc',
                                    'olongapo_purchase_order_no.po_date',
                                    ])
                            ->where('olongapo_purchase_request_no.id', $request->input('prno_id'))
                            ->get();
                            return $items;
    }

    public function add_po_records(Request $request){

        $validator = Validator::make($request->all(), [
                        'po_date' => 'required|date|unique:olongapo_purchase_order_no,po_no',
                        'po_no' => 'required',
                        'prno_id' => 'required',
                        'pr_dept_id' => 'required|exists:olongapo_subdepartment,id',
                    ]);

         if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 0;
            $data['errors'] = 'error Successfull';

            $items_id = $request->input('item_id');
            $brand = $request->input('brand');
            $po_amount = $request->input('po_amount');
            $po_total = $request->input('po_total');


            $PurchaseOrderNo = new PurchaseOrderNo;
            $PurchaseOrderNo->po_no = $request->input('po_no');
            $PurchaseOrderNo->dept_id = $request->input('pr_dept_id');
            $PurchaseOrderNo->po_date = $request->input('po_date');
            $PurchaseOrderNo->prno_id = $request->input('prno_id');
            $PurchaseOrderNo->bac_control_id = $request->input('bac_control_id');

            $PurchaseOrderNo->date_logged = date('Y-m-d');
                if($PurchaseOrderNo->save()){
                    foreach ($items_id as $key => $value) {
                       $purchase_req = new PurchaseOrderItems;
                       $purchase_req->prno_id = $request->input('prno_id');
                       $purchase_req->pono_id = $PurchaseOrderNo->id;
                       $purchase_req->pr_item_id = $value;
                       $purchase_req->po_amount = $po_amount[$key];
                       $purchase_req->po_total = $po_total[$key];
                       $purchase_req->po_brand = $brand[$key];
                       $purchase_req->po_date = date('Y-m-d');
                       $purchase_req->save();
                    }
                    $data['status'] = 1;
                    $data['errors'] = 'Successfull';
                }else{
                    $data['status'] = 0;
                    $data['errors'] = 'Error please refresh and try again.,';
                }
        }

        return $data;
    }

    public function update_po_records(Request $request){

        $validator = Validator::make($request->all(), [
            'po_date' => 'required|date|unique:olongapo_purchase_order_no,po_no'
        ]);

        $check_unique = PurchaseOrderNo::find($request->input('po_id'));

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            if(count($check_unique) == 1){
                $data['status'] = 0;
                $data['errors'] = 'error Successfull';

                $po_item_id = $request->input('po_item_id');
                $brand = $request->input('brand');

                foreach ($po_item_id as $key => $value) {
                   $purchase_req = PurchaseOrderItems::find($po_item_id[$key]);
                   $purchase_req->po_brand = $brand[$key];
                   $purchase_req->save();
                }

                $PurchaseOrderNo = PurchaseOrderNo::find($request->input('po_id'));
                $PurchaseOrderNo->po_no = $request->input('po_no');
                $PurchaseOrderNo->dept_id = $request->input('pr_dept_id');
                $PurchaseOrderNo->po_date = $request->input('po_date');
                $PurchaseOrderNo->prno_id = $request->input('prno_id');
                if($PurchaseOrderNo->save()){
                    $data['status'] = 1;
                    $data['errors'] = 'Successfull';
                }else{
                    $data['status'] = 0;
                    $data['errors'] = 'Error please refresh and try again.,';
                }
            }else{
                $data['status'] = 0;
                $data['errors'] = 'Purchase Number should be unique.,';
            }
        }

        return $data;
    }


    public function check_po_no(Request $request){
        $dt = new Carbon($request->input('po_date'));
            $pr_no = db::table('olongapo_purchase_order_no')
                                ->where('po_date','=',$request->input('po_date'))
                                ->get();
            $get_dept = db::table('olongapo_subdepartment')
                                ->find($request->input('pr_dept_id'));
            $y = $dt->format('y');
            $md = $dt->format('md');
            $dept = $get_dept->dept_id;
            $subdept_code = $get_dept->subdept_code;
            $count = sprintf("%'03d",$pr_no->count());
            $pono = $y.'-'.$dept.'-'.$subdept_code.'-'.$md.'-'.$count;



        return ($pono);
    }

        public function check_ris_no(Request $request){
        $dt = new Carbon($request->input('po_date'));
            $pr_no = db::table('olongapo_purchase_order_no')
                                ->where('po_date','=',$request->input('po_date'))
                                ->get();
            $get_dept = db::table('olongapo_subdepartment')
                                ->find($request->input('pr_dept_id'));
            $y = $dt->format('y');
            $md = $dt->format('m');
            $dept = $get_dept->dept_id;
            $subdept_code = $get_dept->dept_id;
            $count = sprintf("%'03d",$pr_no->count());
            $pono = $subdept_code.'-'.$y.'-'.$md.'-'.$count;



        return ($pono);
    }

      public function get_pr(Request $request){

        $info = DB::table('olongapo_bac_control_info')
                    ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                    ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->join('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    // ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    // ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.pubbid','=','olongapo_absctrct_pubbid.id')
                    ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->select([
                                'olongapo_subdepartment.dept_desc as dept_desc','olongapo_subdepartment.id as dept_id',
                                'olongapo_purchase_request_no.id as prno_id','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_date',
                                'olongapo_obr.obr_no','olongapo_obr.obr_date',
                                'olongapo_absctrct.control_no','olongapo_absctrct.abstrct_date',
                                'olongapo_bac_control_info.bac_control_no',
                                'olongapo_bac_control_info.bac_date',
                                'olongapo_bac_control_info.amount as total_amt',
                                'olongapo_bac_control_info.category_id as category_id',
                                'olongapo_bac_control_info.sourcefund_id as sourcefund_id',
                                'olongapo_bac_control_info.bac_date',
                                'olongapo_bac_control_info.remarks',
                                'olongapo_bac_control_info.bac_type_id',
                                'olongapo_purchase_request_no.proc_type',
                                'olongapo_bac_category.description as bac_categ',
                                'supplier_info.title as suppl_title',
                                'olongapo_bac_control_info.id as control_id',
                                'olongapo_bac_source_fund.description as sourcefund',
                                'olongapo_procurement_method.proc_title as bac_mode',
                                'olongapo_absctrct_pubbid.supplier_id',
                                'olongapo_absctrct_pubbid_apprved.pubbid'
                            ])
                    ->where('olongapo_bac_control_info.id', '=', $request->input('bac_id'))
                    ->first();

        $pubbid = $info->pubbid;

        $items_bac = DB::table('olongapo_absctrct_pubbid_apprved as approved')
                    ->join('olongapo_absctrct_pubbid_item_suppbid as suppbid','suppbid.id','=','approved.suppbid')
                    ->join('olongapo_purchase_request_items as items','items.id','=','approved.pr_item_id')
                    ->select([
                        'items.id as item_id',
                        'items.prno_id as prno_id',
                        'items.prno_id as prno_id',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price',
                        'suppbid.unit_price as abs_price',
                        'suppbid.total_price as abs_total_price'
                    ])
                    ->where('approved.pubbid', '=', $pubbid)
                    ->groupby('items.id')
                    ->get();

        $data['itemsx'] = $items_bac;
        $data['info']  = $info;

        return $data;


    }

 public function get_pc(Request $request){

        $info = DB::table('olongapo_purchase_request_no')
                ->join('olongapo_purchase_request_ppmp_approval' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_ppmp_approval.request_no_id')
                ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                ->leftjoin('olongapo_purchase_order_requisition_number' , 'olongapo_purchase_order_requisition_number.pono_id','=','olongapo_purchase_request_no.id')
                ->select([
                            'olongapo_purchase_request_no.id as prno_id',
                            'olongapo_subdepartment.dept_desc as dpt_desc',
                            'olongapo_purchase_request_no.pr_date_dept as pr_date',
                            'olongapo_subdepartment.dept_id as dept_id',
                ])
                ->where('olongapo_purchase_request_no.pr_purelyconsumption','=','1')
                ->where('olongapo_purchase_request_ppmp_approval.status','=','1')
                ->where('olongapo_purchase_request_no.id', '=', $request->input('pono_id'))
                ->first();

        $record = DB::table('olongapo_purchase_order_requisition_number')->where('pono_id',$request->input('pono_id'))->first();

        $items_bac = DB::table('olongapo_purchase_request_no')
                    ->join('olongapo_purchase_request_ppmp_approval' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_ppmp_approval.request_no_id')
                     ->join('olongapo_purchase_request_items as items','items.prno_id','=','olongapo_purchase_request_no.id')
                    ->select([
                        'items.id as item_id',
                        'items.prno_id as prno_id',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price'
                    ])
                     ->where('olongapo_purchase_request_no.pr_purelyconsumption','=','1')
                     ->where('olongapo_purchase_request_ppmp_approval.status','=','1')
                     ->where('olongapo_purchase_request_no.id', '=', $request->input('pono_id'))
                    ->groupby('items.id')
                    ->get();

        $data['itemsx'] = $items_bac;
        $data['record'] = $record;
        $data['info']  = $info;

        return $data;
    }

    public function get_po(Request $request){
        $info = DB::table('olongapo_purchase_order_no')
                    ->join('olongapo_purchase_request_no' ,'olongapo_purchase_order_no.prno_id','=', 'olongapo_purchase_request_no.id')
                    ->join('olongapo_bac_control_info' ,'olongapo_bac_control_info.id','=', 'olongapo_purchase_order_no.bac_control_id')
                    ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->join('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    // ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    // ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.pubbid','=','olongapo_absctrct_pubbid.id')
                    ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                    ->leftjoin('olongapo_purchase_order_items' , 'olongapo_purchase_order_items.pono_id','=','olongapo_purchase_order_no.id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->leftjoin('olongapo_purchase_order_requisition_number' , 'olongapo_purchase_order_requisition_number.pono_id','=','olongapo_purchase_order_no.id')
                    ->leftjoin('olongapo_purchase_order_acceptance_issuance' , 'olongapo_purchase_order_acceptance_issuance.pono_id','=','olongapo_purchase_order_no.id')
                    ->select([
                                'olongapo_subdepartment.dept_desc as dept_desc','olongapo_subdepartment.id as dept_id',
                                'olongapo_purchase_request_no.id as prno_id','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_date',
                                'olongapo_obr.obr_no','olongapo_obr.obr_date',
                                'olongapo_absctrct.control_no','olongapo_absctrct.abstrct_date',
                                'olongapo_bac_control_info.bac_control_no',
                                'olongapo_bac_control_info.bac_date',
                                'olongapo_bac_control_info.amount as total_amt',
                                'olongapo_bac_control_info.category_id as category_id',
                                'olongapo_bac_control_info.sourcefund_id as sourcefund_id',
                                'olongapo_bac_control_info.bac_date',
                                'olongapo_bac_control_info.remarks',
                                'olongapo_bac_control_info.bac_type_id',
                                'olongapo_purchase_request_no.proc_type',
                                'olongapo_bac_category.description as bac_categ',
                                'supplier_info.title as suppl_title',
                                'olongapo_bac_control_info.id as control_id',
                                'olongapo_bac_source_fund.description as sourcefund',
                                'olongapo_procurement_method.proc_title as bac_mode',
                                'olongapo_absctrct_pubbid.supplier_id',
                                'olongapo_purchase_order_no.id as pono_id',
                                'olongapo_purchase_order_no.po_no as po_no',
                                'olongapo_purchase_order_no.po_date as po_date',
                                'olongapo_purchase_order_acceptance_issuance.id as acceptance_id',
                                'olongapo_purchase_order_acceptance_issuance.aai_no',
                                'olongapo_purchase_order_acceptance_issuance.aai_date',
                                'olongapo_purchase_order_acceptance_issuance.invoice_no',
                                'olongapo_purchase_order_acceptance_issuance.invoice_date',
                                'olongapo_purchase_order_requisition_number.id as requisition_id',
                                'olongapo_purchase_order_requisition_number.ris_no',
                                'olongapo_purchase_order_requisition_number.ris_date'
                            ])
                    ->where('olongapo_purchase_order_no.id', '=', $request->input('pono_id'))
                    ->get();

        $items_bac = DB::table('olongapo_purchase_order_items as po')
                    ->join('olongapo_purchase_request_items as items','items.id','=','po.pr_item_id')
                    ->select([
                        'po.id as po_item_id',
                        'po.po_amount',
                        'po.po_total',
                        'po.po_brand',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price'
                    ])
                    ->where('po.pono_id','=',$request->input('pono_id'))
                    ->get();

        $data['itemsx'] = $items_bac;
        $data['info']  = $info[0];

        return $data;
    }

    public function po_pdf(Request $request,$id,$auth){

        $info = DB::table('olongapo_purchase_order_no')
                    ->join('olongapo_bac_control_info' ,'olongapo_bac_control_info.id','=', 'olongapo_purchase_order_no.bac_control_id')
                    ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                    // ->join('olongapo_employee_list', 'olongapo_purchase_request_no.requested_by', '=', 'olongapo_employee_list.id')
                    ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->join('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                    ->leftjoin('olongapo_purchase_order_items' , 'olongapo_purchase_order_items.pr_item_id','=','olongapo_absctrct_pubbid_apprved.pr_item_id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->leftjoin('supplier_address' , 'supplier_address.supplier_id','=','supplier_info.id')
                    ->select([
                                'olongapo_subdepartment.dept_desc as dept_desc','olongapo_subdepartment.id as dept_id',
                                'olongapo_purchase_request_no.id as prno_id','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_date',
                                'olongapo_obr.obr_no','olongapo_obr.obr_date',
                                'olongapo_absctrct.control_no',
                                'olongapo_absctrct.abstrct_date',
                                'olongapo_purchase_request_no.proc_type',
                                'olongapo_bac_category.description as bac_categ',
                                'supplier_info.title as suppl_title',
                                'supplier_address.details',
                                'olongapo_bac_control_info.id as control_id',
                                'olongapo_bac_source_fund.description as sourcefund',
                                'olongapo_procurement_method.proc_title as bac_mode',
                                'olongapo_absctrct_pubbid.supplier_id',
                                'olongapo_purchase_order_no.id as pono_id',
                                'olongapo_purchase_order_no.po_no as po_no',
                                'olongapo_purchase_order_no.po_date as po_date',
                                'olongapo_purchase_request_no.requested_by as requested_by',
                                // 'olongapo_employee_list.fname as fname',
                                // 'olongapo_employee_list.lname as lname',
                                // 'olongapo_employee_list.mname as mname'
                            ])
                    ->where('olongapo_purchase_order_no.id', '=', $id)
                    ->first();

        $items_bac = DB::table('olongapo_purchase_order_items as po')
                    ->join('olongapo_purchase_request_items as items','items.id','=','po.pr_item_id')
                    ->select([
                        'po.id as po_item_id',
                        'po.po_amount',
                        'po.po_total',
                        'po.po_brand',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price'
                    ])
                    ->where('po.pono_id','=',$id)
                    ->get();

        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;
        $this->data['auth_official'] = $auth;

        // dd($this->data['info']);

        $pdf = PDF::loadView('purchaseorder::purchase-order.pdf',$this->setup());
         $pdf->setPaper(array(0,0,612.00,936.0),'portrait');
       // $pdf->setPaper('legal');
        return @$pdf->stream();

    }

    public function requisition(){
         return view('purchaseorder::requisition.index',$this->setup());
    }

    public function add_requisition(Request $request){
        $validator = Validator::make($request->all(), [
                        'po_date' => 'required|date|unique:olongapo_purchase_order_requisition_number,ris_no'
                    ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 1;
            $data['errors'] = 'Successfull';

            $ris_no = $request->input('ris_no');
            $ris_date = $request->input('ris_date');
            $po_id = $request->input('po_id');

            // $requisition = new PurchaseOrderRequisition;
            if($request->input('requisition_id')){
                $requisition = PurchaseOrderRequisition::find($request->input('requisition_id'));
            }else{
                $requisition = new PurchaseOrderRequisition;
            }
            $requisition->pono_id = $po_id;
            $requisition->ris_no = $ris_no;
            $requisition->ris_date = $ris_date;
            $requisition->save();

        }
        return $data;
    }



    public function po_acceptance(){

         $this->data['employee'] = Employee::all();
         return view('purchaseorder::acceptance.index',$this->setup());
    }


    public function add_acceptance(Request $request){
        $validator = Validator::make($request->all(), [
            'po_date' => 'required|date|unique:olongapo_purchase_order_acceptance_issuance,aai_no'
        ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 1;
            $data['errors'] = 'Successfull';


            $po_id = $request->input('po_id');
            $acceptance_no = $request->input('aai_no');
            $aai_date = $request->input('aai_date');
            $invoice_no = $request->input('invoice_no');
            $invoice_date = $request->input('invoice_date');

            if($request->input('acceptance_id')){
                $requisition = PurchaseOrderAcceptance::find($request->input('acceptance_id'));
            }else{
                $requisition = new PurchaseOrderAcceptance;
            }

            $requisition->pono_id = $po_id;
            $requisition->aai_no = $acceptance_no;
            $requisition->aai_date = $aai_date;
            $requisition->invoice_no = $invoice_no;
            $requisition->invoice_date  = $invoice_date;
            $requisition->save();

        }
        return $data;
    }

    public function requisition_pdf(Request $request){
         $info = DB::table('olongapo_purchase_order_no')
                    ->join('olongapo_purchase_order_requisition_number' ,'olongapo_purchase_order_requisition_number.pono_id','=', 'olongapo_purchase_order_no.id')
                    ->join('olongapo_bac_control_info' ,'olongapo_bac_control_info.id','=', 'olongapo_purchase_order_no.bac_control_id')
                    ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                    ->leftjoin('olongapo_employee_list', 'olongapo_purchase_request_no.requested_by', '=', 'olongapo_employee_list.id')
                    ->leftjoin('olongapo_position', 'olongapo_position.id', '=', 'olongapo_employee_list.position_id')
                    ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->join('olongapo_department','olongapo_department.id','=','olongapo_subdepartment.dept_id')
                    ->leftjoin('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                    ->leftjoin('olongapo_purchase_order_items' , 'olongapo_purchase_order_items.pr_item_id','=','olongapo_absctrct_pubbid_apprved.pr_item_id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->leftjoin('supplier_address' , 'supplier_address.supplier_id','=','supplier_info.id')
                    ->select([
                                'olongapo_subdepartment.dept_desc as dept_desc',
                                'olongapo_department.dept_desc as _main_dept_desc',
                                'olongapo_subdepartment.id as dept_id',
                                'olongapo_purchase_request_no.id as prno_id','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_date',
                                'olongapo_obr.obr_no','olongapo_obr.obr_date',
                                'olongapo_absctrct.control_no',
                                'olongapo_absctrct.abstrct_date',
                                'olongapo_purchase_request_no.proc_type',
                                'olongapo_purchase_request_no.sai_no',
                                'olongapo_purchase_request_no.pr_purpose',
                                'olongapo_purchase_request_no.sai_date',
                                'olongapo_bac_category.description as bac_categ',
                                'supplier_info.title as suppl_title',
                                'supplier_address.details',
                                'olongapo_purchase_request_no.requested_by',
                                'olongapo_purchase_request_no.designated',
                                'olongapo_bac_control_info.id as control_id',
                                'olongapo_bac_source_fund.description as sourcefund',
                                'olongapo_procurement_method.proc_title as bac_mode',
                                'olongapo_absctrct_pubbid.supplier_id',
                                'olongapo_purchase_order_no.id as pono_id',
                                'olongapo_purchase_order_no.po_no as po_no',
                                'olongapo_purchase_order_no.po_date as po_date',
                                'olongapo_purchase_order_requisition_number.ris_no',
                                'olongapo_purchase_order_requisition_number.ris_date',
                                'olongapo_position.title as designation'
                            ])
                    ->where('olongapo_purchase_order_requisition_number.id', '=', $request->input('requisition_id'))
                    ->first();

        $items_bac = DB::table('olongapo_purchase_order_items as po')
                    ->join('olongapo_purchase_request_items as items','items.id','=','po.pr_item_id')
                    ->select([
                        'po.id as po_item_id',
                        'po.po_amount',
                        'po.po_total',
                        'po.po_brand',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price'
                    ])
                    ->where('po.pono_id','=',$info->pono_id)
                    ->get();

        $request_signee = DB::table('olongapo_purchase_request_signee')->get();

        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;
        $this->data['request_signee']  = $request_signee;

        if(isset($request->pdf)) {
            $pdf = PDF::loadView('purchaseorder::requisition.pdf',$this->setup());
            $pdf->setPaper(array(0,0,612.00,936.0));
            //$pdf->setPaper('legal');
            return @$pdf->stream();
        } elseif(isset($request->excel)) {
            Excel::create('RequisitionAndIssueSlip.xlsx', function($excel) {
                $excel->sheet('RIS', function($sheet) {
                    $sheet->loadView('purchaseorder::requisition.excel', $this->data);

                    // styles
                    $sheet->setWidth(array(
                        'A' => 20,
                        'B' => 15,
                        'C' => 15,
                        'D' => 15,
                        'E' => 15,
                        'F' => 15,
                        'G' => 15,
                        'H' => 15,
                        'I' => 15,
                    ));
                    $sheet->mergeCells('A1:G1');
                    $sheet->mergeCells('A2:G2');
                    $sheet->mergeCells('A3:G3');
                    $sheet->mergeCells('A4:G4');
                    $sheet->mergeCells('A7:E7');
                    $sheet->mergeCells('F7:G7');
                    $sheet->mergeCells('C8:D8');
                    for($i = 9; $i <= 41; $i++){
                        $sheet->mergeCells('C'.$i.':D'.$i);
                    }
                    $sheet->mergeCells('A42:F42');
                    $sheet->mergeCells('B43:G43');
                    $sheet->mergeCells('B44:C44');
                    $sheet->mergeCells('B45:C45');
                    $sheet->mergeCells('B46:C46');
                    $sheet->mergeCells('B47:C47');
                    $sheet->mergeCells('B48:C48');
                    $sheet->mergeCells('D44:E44');

                    $sheet->getStyle('A1:G48')->getAlignment()->setWrapText(true);
                    $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A2:G2')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A3:G3')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A4:G4')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A5:G6')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A7:E7')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('F7:G7')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('C8:D8')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A9:G41')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A42:F42')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B43:G43')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B44:C44')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B45:C45')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B46:C46')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B47:C47')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B48:C48')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('D44:E44')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('D45:E48')->getAlignment()->setHorizontal('center');

                    // borders
                    // setBorder(top,right,bottom,left)
                    $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
                    $last_item_cell = 41;
                    for($col = 0; $col < count($columns); $col++) {
                        for($cell = 8; $cell <= $last_item_cell; $cell++) {
                            if($cell == 8) {
                                if($columns[$col] == 'A') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thin', 'thin', 'thick');
                                    });
                                } elseif($columns[$col] == 'G') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thick', 'thin', 'thin');
                                    });
                                } elseif($columns[$col] == 'E') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'double', 'thin', 'thin');
                                    });
                                } else {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thin', 'thin', 'thin');
                                    });
                                }
                            } elseif($cell == $last_item_cell) {
                                if($columns[$col] == 'A') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thin', 'thin', 'thick');
                                    });
                                } elseif($columns[$col] == 'G') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thick', 'thin', 'thin');
                                    });
                                } elseif($columns[$col] == 'E') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'double', 'thin', 'thin');
                                    });
                                } else {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thin', 'thin', 'thin');
                                    });
                                }
                            } else {
                                if($columns[$col] == 'A') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thin', 'thin', 'thick');
                                    });
                                } elseif($columns[$col] == 'G') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thick', 'thin', 'thin');
                                    });
                                } elseif($columns[$col] == 'E') {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'double', 'thin', 'thin');
                                    });
                                } else {
                                    $sheet->cell($columns[$col].$cell , function($cell) {
                                        $cell->setBorder('thin', 'thin', 'thin', 'thin');
                                    });
                                }
                            }
                        }
                    }
                    $sheet->cell('A1:A4', function($cell) {
                        $cell->setBorder('thick', 'thick', 'none', 'thick');
                    });
                    $sheet->cell('A5:B6', function($cell) {
                        $cell->setBorder('double', 'double', 'double', 'thick');
                    });
                    $sheet->cell('C5:C6', function($cell) {
                        $cell->setBorder('double', 'double', 'double', 'double');
                    });
                    $sheet->cell('D5:G6', function($cell) {
                        $cell->setBorder('double', 'thick', 'double', 'double');
                    });
                    $sheet->cell('A7', function($cell) {
                        $cell->setBorder('double', 'double', 'thin', 'thick');
                    });
                    $sheet->cell('F7', function($cell) {
                        $cell->setBorder('double', 'thick', 'thin', 'double');
                    });
                    $sheet->cell('A42', function($cell) {
                        $cell->setBorder('double', 'thin', 'double', 'thick');
                    });
                    $sheet->cell('A42', function($cell) {
                        $cell->setBorder('thin', 'thin', 'double', 'thick');
                    });
                    $sheet->cell('G42', function($cell) {
                        $cell->setBorder('thin', 'thick', 'double', 'thin');
                    });
                    $sheet->cell('A43', function($cell) {
                        $cell->setBorder('double', 'none', 'double', 'thick');
                    });
                    $sheet->cell('B43', function($cell) {
                        $cell->setBorder('double', 'thick', 'double', 'none');
                    });

                    $sheet->cell('A44:A48', function($cell) {
                        $cell->setBorder('double', 'thin', 'thick', 'thick');
                    });
                    $sheet->cell('B44:C48', function($cell) {
                        $cell->setBorder('double', 'thin', 'thick', 'thin');
                    });
                    $sheet->cell('D44', function($cell) {
                        $cell->setBorder('double', 'thin', 'thin', 'thin');
                    });
                    $sheet->cell('D45:E48', function($cell) {
                        $cell->setBorder('thin', 'thin', 'thick', 'thin');
                    });
                    $sheet->cell('F44:F48', function($cell) {
                        $cell->setBorder('double', 'thin', 'thick', 'thin');
                    });
                    $sheet->cell('G44:G48', function($cell) {
                        $cell->setBorder('double', 'thick', 'thick', 'thin');
                    });
                    $sheet->cell('A44:G44', function($cell) {
                        $cell->setBorder('double', 'thick', 'thin', 'thick');
                    });
                    $sheet->cell('A45:G45', function($cell) {
                        $cell->setBorder('thin', 'thick', 'thin', 'thick');
                    });
                    $sheet->cell('A46:G46', function($cell) {
                        $cell->setBorder('thin', 'thick', 'thin', 'thick');
                    });
                    $sheet->cell('A47:G47', function($cell) {
                        $cell->setBorder('thin', 'thick', 'thin', 'thick');
                    });
                    $sheet->cell('A48:G48', function($cell) {
                        $cell->setBorder('thin', 'thick', 'thick', 'thick');
                    });
                    // fonts
                    $sheet->cell('A1:G1', function($cell) {
                        $cell->setFontFamily('Arial Black');
                        $cell->setFontSize('14');
                        $cell->setFont(array(
                            'bold' => true,
                        ));
                    });
                    $sheet->cell('A3:G4', function($cell) {
                        $cell->setFontFamily('Arial');
                        $cell->setFontSize('10');
                    });
                    $sheet->cell('A3:G48', function($cell) {
                        $cell->setFontFamily('Arial');
                        $cell->setFontSize('11');
                    });
                    $sheet->cell('A3:G4', function($cell) {
                        $cell->setFontSize('10');
                    });
                    $sheet->cell('A5:G6', function($cell) {
                        $cell->setFontSize('11');
                    });
                    $sheet->cell('A7:F7', function($cell) {
                        $cell->setFont(array(
                            'bold' => true,
                            'italic' => true,
                        ));
                    });
                    $sheet->cell('A8:G8', function($cell) {
                        $cell->setBackground('#e7e6e6');
                    });
                    $sheet->cell('A8:G41', function($cell) {
                        $cell->setFontSize('11');
                    });
                    $sheet->cell('A44:G48', function($cell) {
                        $cell->setFontSize('11');
                    });
                    $sheet->cell('B5:B6', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    $sheet->cell('E5:E6', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    $sheet->cell('G5:G6', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    // image //here
                    $logo = new PHPExcel_Worksheet_Drawing;
                    $logo->setPath(public_path().'\olongapo\img\logo-100.png');
                    $logo->setCoordinates('D2');
                    $sheet->setHeight('2', '25');
                    $logo->setHeight(34);
                    $logo->setWidth(37);
                    $sheet->getStyle('D2')->getAlignment()->setHorizontal('center');
                    $logo->setWorksheet($sheet);
                    // end styles
                });
            })->download();
        }
        // $pdf = PDF::loadView('purchaseorder::requisition.pdf',$this->setup());
        // $pdf->setPaper(array(0,0,612.00,936.0));
        //$pdf->setPaper('legal');
        // return @$pdf->stream();
    }

 public function requisition_pc_pdf(Request $request){

         $info = DB::table('olongapo_purchase_request_no')
                ->join('olongapo_purchase_order_requisition_number' ,'olongapo_purchase_order_requisition_number.pono_id','=', 'olongapo_purchase_request_no.id')
                ->join('olongapo_purchase_request_ppmp_approval' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_ppmp_approval.request_no_id')
                ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                ->join('olongapo_department','olongapo_department.id','=','olongapo_subdepartment.dept_id')
                ->leftjoin('olongapo_employee_list', 'olongapo_purchase_request_no.requested_by', '=', 'olongapo_employee_list.id')
                ->leftjoin('olongapo_position', 'olongapo_position.id', '=', 'olongapo_employee_list.position_id')

                    ->select([
                                'olongapo_purchase_request_no.id as prno_id',
                                'olongapo_department.dept_desc as _main_dept_desc',
                                'olongapo_purchase_order_requisition_number.ris_no',
                                'olongapo_purchase_order_requisition_number.ris_date',
                                'olongapo_employee_list.fname as fname',
                                'olongapo_employee_list.lname as lname',
                                'olongapo_employee_list.mname as mname',
                                'olongapo_position.title as designation',
                                'olongapo_purchase_request_no.requested_by'
                            ])
                ->where('olongapo_purchase_order_requisition_number.id', '=', $request->input('requisition_id'))
                ->where('olongapo_purchase_request_no.pr_purelyconsumption','=','1')
                ->where('olongapo_purchase_request_ppmp_approval.status','=','1')
                ->first();

        $items_bac = DB::table('olongapo_purchase_request_no')
                    ->join('olongapo_purchase_request_ppmp_approval' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_ppmp_approval.request_no_id')
                     ->join('olongapo_purchase_request_items as items','items.prno_id','=','olongapo_purchase_request_no.id')
                    ->select([
                        'items.id as item_id',
                        'items.prno_id as prno_id',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price'
                    ])
                     ->where('olongapo_purchase_request_no.pr_purelyconsumption','=','1')
                     ->where('olongapo_purchase_request_ppmp_approval.status','=','1')
                     ->where('olongapo_purchase_request_no.id', '=',$info->prno_id)
                    ->groupby('items.id')
                    ->get();

        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;

        $pdf = PDF::loadView('purchaseorder::requisition.pdf2',$this->setup());
        $pdf->setPaper(array(0,0,612.00,936.0));
        //$pdf->setPaper('legal');
        return @$pdf->stream();
    }

    public function acceptance_pdf(Request $request,$id,$aid,$prop, $type){
        $params = array();
        parse_str($prop, $params);
         $info = DB::table('olongapo_purchase_order_no')
                    ->join('olongapo_purchase_order_acceptance_issuance' ,'olongapo_purchase_order_acceptance_issuance.pono_id','=', 'olongapo_purchase_order_no.id')
                    ->join('olongapo_bac_control_info' ,'olongapo_bac_control_info.id','=', 'olongapo_purchase_order_no.bac_control_id')
                    ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                    ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->join('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                    ->leftjoin('olongapo_purchase_order_items' , 'olongapo_purchase_order_items.pr_item_id','=','olongapo_absctrct_pubbid_apprved.pr_item_id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->leftjoin('supplier_address' , 'supplier_address.supplier_id','=','supplier_info.id')
                    ->select([
                                'olongapo_subdepartment.dept_desc as dept_desc','olongapo_subdepartment.subdept_code','olongapo_subdepartment.id as dept_id',
                                'olongapo_purchase_request_no.id as prno_id','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_date',
                                'olongapo_obr.obr_no','olongapo_obr.obr_date',
                                'olongapo_absctrct.control_no',
                                'olongapo_absctrct.abstrct_date',
                                'olongapo_purchase_request_no.proc_type',
                                'olongapo_bac_category.description as bac_categ',
                                'supplier_info.title as suppl_title',
                                'supplier_address.details',
                                'olongapo_bac_control_info.id as control_id',
                                'olongapo_bac_source_fund.description as sourcefund',
                                'olongapo_procurement_method.proc_title as bac_mode',
                                'olongapo_absctrct_pubbid.supplier_id',
                                'olongapo_purchase_order_no.id as pono_id',
                                'olongapo_purchase_order_no.po_no as po_no',
                                'olongapo_purchase_order_no.po_date as po_date',
                                'olongapo_purchase_order_acceptance_issuance.aai_no',
                                'olongapo_purchase_order_acceptance_issuance.aai_date',
                                'olongapo_purchase_order_acceptance_issuance.invoice_no',
                                'olongapo_purchase_order_acceptance_issuance.invoice_date'
                            ])
                    ->where('olongapo_purchase_order_acceptance_issuance.id', '=', $aid)
                    ->first();

        $items_bac = DB::table('olongapo_purchase_order_items as po')
                    ->join('olongapo_purchase_request_items as items','items.id','=','po.pr_item_id')
                    ->select([
                        'po.id as po_item_id',
                        'po.po_amount',
                        'po.po_total',
                        'po.po_brand',
                        'items.description as description',
                        'items.unit as unit',
                        'items.qty as qty',
                        'items.remarks as remarks',
                        'items.unit_price as unit_price',
                        'items.total_price as total_price'
                    ])
                    ->where('po.pono_id','=',$id)
                    ->get();

        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;
        $this->data['prop'] =$prop;
        $this->data['req'] =$params;

        if($type == 1) {
            $pdf = PDF::loadView('purchaseorder::acceptance.pdf',$this->setup());
            $pdf->setPaper(array(0,0,612.00,936.0));
            //$pdf->setPaper('legal');
            return @$pdf->stream();

        } elseif($type == 2) {
            $excel = Excel::create('PurchaseOrderAcceptance.xlsx', function($excel) {
                $excel->sheet('AIR', function($sheet) {
                    // split array into groups w/ 35 items each, each group one sheet..
                    // limit 35 items in one sheet..
                    $sheet->loadView('purchaseorder::acceptance.excel', $this->data);

                    // styles
                    $sheet->mergeCells('A1:D1');
                    $sheet->mergeCells('A2:D2');
                    $sheet->mergeCells('A3:D3');
                    $sheet->mergeCells('A37:B37');
                    $sheet->mergeCells('C37:D37');
                    $sheet->mergeCells('A39:B39');
                    $sheet->mergeCells('A40:B40');
                    $sheet->mergeCells('C39:D40');
                    $sheet->mergeCells('A41:B41');
                    $sheet->mergeCells('C41:D41');
                    $sheet->mergeCells('A42:B42');
                    $sheet->mergeCells('C42:D42');
                    $sheet->setWidth(array(
                        'A' => 25,
                        'B' => 25,
                        'C' => 25,
                        'D' => 25,
                    ));
                    $sheet->getStyle('A1:D49')->getAlignment()->setWrapText(true);
                    $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A2:D2')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A3:D3')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('B4:B7')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('D4:D7')->getAlignment()->setHorizontal('center');  
                    $sheet->getStyle('A8:D43')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A37:B37')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('C37:D37')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A39:B39')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A40:B40')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('C39:D40')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A41:B41')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('C41:D41')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A42:B42')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('C42:D42')->getAlignment()->setHorizontal('center');

                    // border 
                    // setBorder(top,right,bottom,left)
                    $sheet->cell('A8:A36', function($cell) {
                        $cell->setBorder('double', 'thin', 'double', 'thick');
                    });
                    $sheet->cell('B8:B36', function($cell) {
                        $cell->setBorder('double', 'thin', 'double', 'thin');
                    });
                    $sheet->cell('C8:C36', function($cell) {
                        $cell->setBorder('double', 'thin', 'double', 'thin');
                    });
                    $sheet->cell('D8:D36', function($cell) {
                        $cell->setBorder('double', 'thick', 'double', 'thin');
                    });
                    // for items cells...
                    for($i = 8; $i <= 36; $i++) {
                        if($i == 8) {
                            $sheet->cell('A'.$i.':D'.$i, function($cell) {
                                $cell->setBorder('double', 'thick', 'thin', 'thick');
                            });
                        } elseif($i == 36) {
                            $sheet->cell('A'.$i.':D'.$i, function($cell) {
                                $cell->setBorder('thin', 'thick', 'double', 'thick');
                            });
                        } else {
                            $sheet->cell('A'.$i.':D'.$i, function($cell) {
                                $cell->setBorder('thin', 'thick', 'thin', 'thick');
                            });
                        }
                    }
                    $sheet->cell('A1:A3', function($cell) {
                        $cell->setBorder('thick', 'thick', 'double', 'thick');
                    });
                    $sheet->cell('A4:D42', function($cell) {
                        $cell->setBorder('none', 'thick', 'none', 'thick');
                    });
                    $sheet->cell('A7:D7', function($cell) {
                        $cell->setBorder('none', 'thick', 'double', 'thick');
                    });
                    $sheet->cell('A37', function($cell) {
                        $cell->setBorder('double', 'thin', 'thin', 'thick');
                    });
                    $sheet->cell('C37', function($cell) {
                        $cell->setBorder('double', 'thick', 'thin', 'thin');
                    });
                    $sheet->cell('A38:B38', function($cell) {
                        $cell->setBorder('thin', 'thin', 'none', 'thick');
                    });
                    $sheet->cell('A39:B42', function($cell) {
                        $cell->setBorder('none', 'thin', 'thick', 'thick');
                    });
                    $sheet->cell('C39', function($cell) {
                        $cell->setBorder('none', 'thick', 'thick', 'thin');
                    });
                    $sheet->cell('C41:C42', function($cell) {
                        $cell->setBorder('none', 'thick', 'thick', 'thin');
                    });
                    $sheet->cell('C39', function($cell) {
                        $cell->setBorder('none', 'thick', 'none', 'thin');
                    });
                    // fonts
                    $sheet->getStyle('A37:C37')->getFont()->setBold(true);
                    $sheet->cell('A2:D42', function($cell) {
                        $cell->setFontFamily('Arial');
                        $cell->setFontSize('11');
                    });
                    $sheet->cell('A8:D8', function($cell) {
                        $cell->setFontSize('12');
                    });
                    $sheet->cell('A37:D37', function($cell) {
                        $cell->setFontSize('12');
                    });
                    $sheet->cell('A1:B1', function($cell) {
                        $cell->setFontFamily('Georgia');
                        $cell->setFontSize('16');
                    });
                    $sheet->cell('B4:B7', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    $sheet->cell('D4:D7', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    $sheet->cell('B38', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    $sheet->cell('D38', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    $sheet->cell('A41:D41', function($cell) {
                        $cell->setFont(array(
                            'underline' => true,
                        ));
                    });
                    // end styles
                });
            })->download();
        }
        
    }
}
