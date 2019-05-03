<?php

namespace Modules\PurchaseRequest\Http\Controllers;
use Modules\Setup\Init;
use Modules\Setup\Library\Remarks;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Modules\PurchaseRequest\Entities\PurchaseItems;
use Modules\PurchaseRequest\Entities\PurchaseNo;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Modules\PurchaseRequest\Entities\OBR;
use Modules\PurchaseRequest\Entities\ApproveSupp;

use Modules\GSOassistant\Entities\Procmethod;
use PDF;

use Modules\GSOassistant\Entities\Requestordersignee;


class PurchaseRequestController extends Controller
{

    protected $data;
    protected $page_title = 'Purchase Request';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        return view('purchaserequest::request.index',$this->setup());
    }



    public function get_pr(Request $request){
         $itemsx = DB::table('olongapo_purchase_request_items')
                                ->where('olongapo_purchase_request_items.id','=',$request->input('pr_no'))
                                ->first();
        $remarks = DB::table('olongapo_purchase_request_no')->select('remarks')->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)->first();

        $items = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                            ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->leftjoin('olongapo_obr','olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                            ->leftjoin('olongapo_approved_supplier','olongapo_approved_supplier.pr_no','=','olongapo_purchase_request_no.id')
                            ->leftjoin('supplier_info','supplier_info.id','=','olongapo_approved_supplier.supp_id')
                            ->select([
                                    'olongapo_purchase_request_items.id as item_id',
                                    'olongapo_purchase_request_items.description',
                                    'olongapo_purchase_request_items.remarks',
                                    'olongapo_purchase_request_items.unit',
                                    'olongapo_purchase_request_items.qty',
                                    'olongapo_purchase_request_items.unit_price',
                                    'olongapo_purchase_request_no.id as prno_id',
                                    'olongapo_purchase_request_no.dept_id as prno_dept',
                                    'olongapo_purchase_request_no.pr_date as prno_date',
                                    'olongapo_purchase_request_no.pr_count as prno_count',
                                    'olongapo_purchase_request_no.pr_no',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code',
                                    'olongapo_subdepartment.dept_desc',
                                    'olongapo_obr.obr_no',
                                    'olongapo_obr.obr_date',
                                    'supplier_info.title as supplier_desc',
                                    'supplier_info.id as supplier_id'
                                ])
                            ->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)
                            ->where('olongapo_purchase_request_items.deleted_at','=',NULL);

        $data['items'] = $items->get();

        $remarks = json_decode($remarks->remarks);
        $remakrs_msg = '';
        for($x=0;$x<count($remarks);$x++){
            $date = new Carbon($remarks[$x]->date);
            $remakrs_msg .= '<p class="lead"><strong>'.$remarks[$x]->user_id.'</strong><br />
                            '.$remarks[$x]->remarks.'<br /><mark>'.$date.'</mark></p>';
        }
        $data['remarks'] =$remakrs_msg ;
        return $data;
    }

    public function pr_edit( Request $request){

        // dd('asdas');
        $this->data['proc_methods'] = Procmethod::all();
        $this->data['edit_view']   = $request->input('view')  ? 'view' :  'edit';
        $purely_consumption   = PurchaseNo::find($request->input('pr_id'));
        $this->data['purely_consumption']   = $purely_consumption->pr_purelyconsumption;
        $this->data['pr'] = PurchaseNo::find($request->input('pr_id'));

        if($request->input('pdf')){
            $this->data['approved_by'] = Requestordersignee::where('deleted_at','=',null)->get();

            $this->data['requested_by'] = DB::table('olongapo_purchase_request_no')
                                        ->join('olongapo_employee_list', 'olongapo_purchase_request_no.requested_by', '=', 'olongapo_employee_list.id')
                                        ->leftjoin('olongapo_position', 'olongapo_position.id', '=', 'olongapo_employee_list.position_id')
                                        ->select([
                                            'olongapo_employee_list.fname',
                                            'olongapo_employee_list.lname',
                                            'olongapo_employee_list.mname',
                                            'olongapo_position.title'
                                        ])
                                        ->where('olongapo_purchase_request_no.id', '=', $request->input('pr_id') )
                                        ->first();

            $pdf = PDF::loadView('purchaserequest::request.pdf',$this->setup());
           $pdf->setPaper(array(0,0,612.00,936.0));

            return @$pdf->stream();

        }else{
            return view('purchaserequest::request.edit',$this->setup());
        }
    }

    public function save_edit(Request $request){
        if($request->input('cancel')){
            return redirect()->route('dept.index');
        }

             $validator = Validator::make($request->all(), [
                                    'item_price.*'  =>  ['required','regex:/^(0|[1-9]\d*)(\.\d+)?$/'],
                                    'pr_date'    => 'required|date',
                                  ],
                                  [
                                    'item_price.*.required' => 'PURCHASE REQUEST ITEMS UNIT PRICE IS REQUIRED',
                                    'pr_date.required' => 'PURCHASE REQUEST DATE IS REQUIRED',
                                    'item_price.*.regex' => 'PURCHASE REQUEST ITEMS UNIT PRICE FORMAT IS INVALID',
               ]);

       if($validator->fails()){
            return back()->withInput()->withErrors($validator->messages());
        }else{
                 $PurchaseNo = PurchaseNo::find($request->input('pr_id'));
                 if($PurchaseNo->pr_purelyconsumption == 0){
                 if($PurchaseNo){
                    // $PurchaseNo->requested_by = Session::get('jhmc_permission')->id;
                    $PurchaseNo->pr_date = $request->input('pr_date');
                    $PurchaseNo->pr_no = $request->input('pr_no');
                    $PurchaseNo->proc_type = $request->input('proc_type');
                    $PurchaseNo->sai_no = $request->input('sai_no');
                    $PurchaseNo->sai_date = $request->input('sai_date');
                    $PurchaseNo->save();
                       for($x = 0 ; $x< count($request->input('item_desc'));$x++){
                                    if($request->input('item_id.'.$x)){
                                            $item =  $PurchaseNo->pr_items()->where('id',$request->input('item_id.'.$x))->first();
                                            $item->unit_price =  $request->input('item_price.'.$x);
                                            $item->total_price =  $request->input('item_qty.'.$x)*$request->input('item_price.'.$x);
                                              if($request->input('delete.'.$x) === 'true'){
                                                $item->delete();
                                            }else{
                                                $item->save();
                                            }

                                    }
                        }

                        if( $request->input('obr_no') != '' && $request->input('obr_date') != ''){
                            if($PurchaseNo->obr_id != null){
                                $obr = OBR::find($PurchaseNo->obr_id);
                            }else{
                                $obr = new OBR;
                            }

                            $obr->obr_no = $request->input('obr_no');
                            $obr->obr_date = $request->input('obr_date');
                            $obr->save();
                            $PurchaseNo->obr_id =  $obr->id;
                            $PurchaseNo->save();
                        }


                        Session::flash('info', ['Purchase Request Successfully Updated']);
                        return back()->withInput();
                    }
                 }else{
                    if($PurchaseNo){
                    // $PurchaseNo->requested_by = Session::get('jhmc_permission')->id;
                    $PurchaseNo->pr_date = $request->input('pr_date');
                    $PurchaseNo->pr_no = $request->input('pr_no');
                    $PurchaseNo->proc_type = $request->input('proc_type');
                    $PurchaseNo->save();
                       for($x = 0 ; $x< count($request->input('item_desc'));$x++){
                                    if($request->input('item_id.'.$x)){
                                            $item =  $PurchaseNo->pr_items()->where('id',$request->input('item_id.'.$x))->first();
                                            $item->unit_price =  $request->input('item_price.'.$x);
                                            $item->total_price =  $request->input('item_qty.'.$x)*$request->input('item_price.'.$x);
                                              if($request->input('delete.'.$x) === 'true'){
                                                $item->delete();
                                            }else{
                                                $item->save();
                                            }

                                    }
                        }

                        Session::flash('info', ['Purchase Request Successfully Updated']);
                        return back()->withInput();
                    }

                 }
            }

                 Session::flash('danger', ['Purchase Request ERROR UPDATING PLEASE REFRESH YOUR BROWSER AND TRY AGAIN.']);
                return back()->withInput();
}


    public function set_obr($request,$update=false){
        if($update===false)    {$OBR = new OBR;}
        else    {
            $OBR = OBR::where('id','=',$request['obr_no_id'])->first();
            if(!$OBR){
                $OBR = new OBR;
             }
        }
        $OBR->obr_no = $request['obr_no'];
        $OBR->obr_date = $request['obr_date'];
        $OBR->save();
        return $OBR;
    }

    public function set_supplier($request,$update=false){

        if($update===false)    {$ApproveSupp = new ApproveSupp;}
        else{
             $ApproveSupp = ApproveSupp::where('pr_no','=',$request['pr_no'])->first();
             if(!$ApproveSupp){
                $ApproveSupp = new ApproveSupp;
             }
        }
        $ApproveSupp->pr_no = $request['pr_no'];
        $ApproveSupp->supp_id = $request['supplier_id'];
        $ApproveSupp->save();
        return $ApproveSupp;
    }

    public function get_pr_counter(Request $request){
            $dt =new Carbon($request->input('pr_date'));

                 $pr = PurchaseNo::find($request->input('pr_id'));

        $pr_no  = DB::table('olongapo_purchase_request_no')
                            ->select(DB::raw('COUNT(id) as pr_count'))
                            ->whereMonth('pr_date','=',$dt->format('m'))
                            ->get();
        $pr_count = $pr_no[0]->pr_count > 1 ? $pr_no[0]->pr_count-1 : $pr_no[0]->pr_count;
        $sdept = $pr->pr_dept->subdept_code == 0 ? '' : '.'.$pr->pr_dept->subdept_code;
        $pr_count = (( $pr_no[0]->pr_count > 0) ? $pr_no[0]->pr_count : 0);
        $pr_nox = ($pr->pr_dept->dept->dept_code).$sdept.'-'.$dt->format('y').'-'.$dt->format('m').'-'.$dt->format('d').'-'.sprintf('%03d', $pr_count);
        return  json_encode($pr_nox);
    }



    public function count_prno($request){
          $pr_counxt = DB::table('olongapo_purchase_request_no')
                                ->where('dept_id','=',$request['pr_dept_id'])
                                ->where('pr_date','=',$request['pr_no_date'])
                                ->get();
            return $pr_counxt;
    }

    public function inpection($value='')
    {
        return view('purchaserequest::inspection.index',$this->setup());
    }


    public function get_request(Request $request){

        $info = DB::table('olongapo_purchase_request_no')
                    ->join('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->join('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_purchase_request_no.id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->leftjoin('olongapo_bac_control_info' , 'olongapo_bac_control_info.prno_id','=','olongapo_purchase_request_no.id')
                    ->leftjoin('olongapo_bac_category' , 'olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->leftjoin('olongapo_absctrct_pubbid_apprved' , 'olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                    ->leftjoin('olongapo_absctrct_pubbid' , 'olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->leftjoin('supplier_info' , 'supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_source_fund' , 'olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    ->leftjoin('olongapo_purchase_order_no' , 'olongapo_purchase_order_no.prno_id','=','olongapo_purchase_request_no.id')
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
                                'olongapo_purchase_order_no.po_no',
                                'olongapo_purchase_order_no.po_date',
                                'olongapo_purchase_order_no.id as po_id'
                            ])
                    ->where('olongapo_purchase_request_no.id','=',$request->input('prno_id'))
                    ->first();

        $items_bac = DB::table('olongapo_purchase_request_items as items')
                    ->leftjoin('olongapo_bac_control_info as bac','bac.prno_id','=','items.prno_id')
                    ->leftjoin('olongapo_purchase_request_no as req','req.id','=','items.prno_id')
                    ->join('olongapo_absctrct_pubbid_item_suppbid as suppbid','suppbid.pr_item_id','=','items.id')
                    ->join('olongapo_absctrct_pubbid as pubbid','pubbid.id','=','suppbid.pubbid_id')
                    ->join('olongapo_absctrct_supplier_apprved as approved','suppbid.id','=','approved.suppbid')
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
                        'suppbid.total_price as abs_total_price',
                        'req.pr_date as pr_date'
                    ])
                    ->where('items.prno_id','=',$request->input('prno_id'))
                    ->get();

        $data['itemsx'] = $items_bac;
        $data['info']  = $info;

        return $data;
    }

}
