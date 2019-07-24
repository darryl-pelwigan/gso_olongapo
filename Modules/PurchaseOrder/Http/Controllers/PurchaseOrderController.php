<?php

namespace Modules\PurchaseOrder\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\PurchaseOrder\Entities\PurchaseOrderNo;
use Modules\PurchaseOrder\Entities\PurchaseOrderItems;
use Modules\PurchaseOrder\Entities\PurchaseOrderRequisition;
use Modules\PurchaseOrder\Entities\PurchaseOrderAcceptance;

use PDF;

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
            $count = sprintf("%'03d",$pr_no->count()+100);
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
            $count = sprintf("%'03d",$pr_no->count()+100);
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

    public function po_pdf(Request $request){

        $info = DB::table('olongapo_purchase_order_no')
                    ->join('olongapo_bac_control_info' ,'olongapo_bac_control_info.id','=', 'olongapo_purchase_order_no.bac_control_id')
                    ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                    ->join('olongapo_employee_list', 'olongapo_purchase_request_no.requested_by', '=', 'olongapo_employee_list.id')
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
                                'olongapo_employee_list.fname as fname',
                                'olongapo_employee_list.lname as lname',
                                'olongapo_employee_list.mname as mname'
                            ])
                    ->where('olongapo_purchase_order_no.id', '=', $request->input('pono_id'))
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
                    ->where('po.pono_id','=',$request->input('pono_id'))
                    ->get();

        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;

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
                                'olongapo_bac_control_info.id as control_id',
                                'olongapo_bac_source_fund.description as sourcefund',
                                'olongapo_procurement_method.proc_title as bac_mode',
                                'olongapo_absctrct_pubbid.supplier_id',
                                'olongapo_purchase_order_no.id as pono_id',
                                'olongapo_purchase_order_no.po_no as po_no',
                                'olongapo_purchase_order_no.po_date as po_date',
                                'olongapo_purchase_order_requisition_number.ris_no',
                                'olongapo_purchase_order_requisition_number.ris_date',
                                'olongapo_employee_list.fname as fname',
                                'olongapo_employee_list.lname as lname',
                                'olongapo_employee_list.mname as mname',
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



        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;

        $pdf = PDF::loadView('purchaseorder::requisition.pdf',$this->setup());
        $pdf->setPaper(array(0,0,612.00,936.0));
        //$pdf->setPaper('legal');
        return @$pdf->stream();
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

    public function acceptance_pdf(Request $request){
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
                    ->where('olongapo_purchase_order_acceptance_issuance.id', '=', $request->input('acceptance_id'))
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

        $this->data['po_items'] = $items_bac;
        $this->data['info']  = $info;

        $pdf = PDF::loadView('purchaseorder::acceptance.pdf',$this->setup());
       $pdf->setPaper(array(0,0,612.00,936.0));
        //$pdf->setPaper('legal');
        return @$pdf->stream();
    }




}
