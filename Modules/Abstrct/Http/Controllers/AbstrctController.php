<?php

namespace Modules\Abstrct\Http\Controllers;
use Modules\Setup\Init;
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

use Modules\Abstrct\Entities\Abstrct;
use Modules\Abstrct\Entities\AbstrctSupplier;
use Modules\Abstrct\Entities\AbstrctItems;
use Modules\Abstrct\Entities\AbstrctSupplierApprved;
use Modules\Abstrct\Entities\AbstrctSignee;
use Modules\GSOassistant\Entities\Procmethod;
use Modules\GSOassistant\Entities\Requestordersignee;


use PDF;

class AbstrctController extends Controller
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

    public function absctrct_list(){
        $this->data['proc_methods'] = Procmethod::all();
        return view('abstrct::abstrct.absctrct_list',$this->setup());
    }

    public function index()
    {
        $this->data['committee'] = db::table('olongapo_bac_awards_committee')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee.employee_id as employee_id','olongapo_bac_awards_committee.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee.deleted_at','=',null)
                                        ->where('department', '=','Bids and Awards Committee')
                                        ->limit(4)
                                        ->orderBy('olongapo_bac_awards_committee.id', 'desc')
                                        ->get();


        $this->data['proc_methods'] = Procmethod::all();

        // $this->data['pr_signee'] = Requestordersignee::()->get();

        return view('abstrct::abstrct.pr-list',$this->setup());
    }

    public function get_control_number(Request $request){
        $date = new Carbon($request['date']);
        $abstrct = DB::table('olongapo_absctrct')->where('abstrct_date','=',$request['date'])->get();
        $count = count($abstrct)+1;
        return $date->format('y-m-d').'-'.sprintf('%03d',$count);
    }

    public function processes(Request $request){
        $validator = Validator::make($request->all(), [
                        'absctrct_no' => 'required|unique:olongapo_absctrct,control_no',
                        'absctrct_date' => 'required|date',
                        'supplier_desc.*' => 'required',
                        'item_price.*.*' => 'required'
                    ],
                    [
                        'absctrct_no.required'      => 'Abstract NO. is required.',
                        'absctrct_no.unique'        => 'Abstract NO. is must be unique.',
                        'absctrct_date.required'    => 'Abstract Date is Required.',
                        'absctrct_date.date'        => 'Abstract Date is not a valid date.',
                        'supplier_desc.*.required'    => 'Supplier Description is Required',
                        'item_price.*.*.required'    => 'Item Price is Required'
                    ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            if(count($request->input('supplier_id')) === count(array_unique($request->input('supplier_id')))){
                if(count($request->input('supplier_item')) === count($request->input('item_id'))){
                    $data['status'] = 1;
                    $Abstrct = new Abstrct;
                    $Abstrct->prno_id = $request['pr_id_update'];
                    $Abstrct->control_no = $request['absctrct_no'];
                    $Abstrct->abstrct_date = $request['absctrct_date'];
                    $Abstrct->save();

                    $purchasereq = PurchaseNo::where('id', '=', $request['pr_id_update'])->first();
                    $purchasereq->proc_type = $request['proc_type'];
                    $purchasereq->save();

                    $supplier_c = count($request['supplier_desc']);
                    $test_x = [];
                    $uprice_x = [];
                    for($x = 0;$x<$supplier_c;$x++){

                        $AbstrctSupplier = new AbstrctSupplier;
                        $AbstrctSupplier->supplier_id = $request['supplier_id.'.$x];
                        $AbstrctSupplier->abstrct_id = $Abstrct->id;
                        $AbstrctSupplier->save();

                        for($y=0;$y<$request['items_num'];$y++){
                            $price = str_replace(',', '', $request['item_price.'.$y.'.'.$x]);
                            $totalprice = $price*$request['qty.'.$y];
                            $AbstrctItems = new AbstrctItems;
                            $AbstrctItems->absctrct_id = $Abstrct->id;
                            $AbstrctItems->pr_item_id = $request['item_id.'.$y];
                            $AbstrctItems->pubbid_id = $AbstrctSupplier->id;
                            $AbstrctItems->unit_price = $price;
                            $AbstrctItems->total_price = $totalprice;
                            $AbstrctItems->save();

                            $test_x[$y] = $request['supplier_desc.'.$x];
                            $uprice_x[$y][$x] = $price;

                            ##get approved supplier
                            if($request['supplier_item.'.$y.'.'.$x] == 1){
                                $AbstrctSupplierApprved = new AbstrctSupplierApprved;
                                $AbstrctSupplierApprved->pr_no = $request['pr_id_update'];
                                $AbstrctSupplierApprved->pr_item_id = $request['item_id.'.$y];
                                $AbstrctSupplierApprved->suppbid = $AbstrctItems->id;
                                $AbstrctSupplierApprved->pubbid = $AbstrctSupplier->id;
                                $AbstrctSupplierApprved->date = date('y-m-d');
                                $AbstrctSupplierApprved->save();
                            }
                        }
                    }

                    ##abstract signee
                    // $result = AbstrctSignee::all();
                    // if(count($result) == 0){
                    //     for ($i=0; $i < count($request->input('employee_id')); $i++) {
                    //         $abstract_sign = new AbstrctSignee;
                    //         $abstract_sign->employee_id = $request->input('employee_id')[$i];
                    //         $abstract_sign->rank = $request->input('rank')[$i];
                    //         $abstract_sign->save();
                    //     }
                    // }else{
                    //     for ($i=0; $i < count($request->input('employee_id')); $i++) {
                    //         $abstract_sign = AbstrctSignee::where('rank', '=', $request->input('rank')[$i])->first();
                    //         $abstract_sign->employee_id = $request->input('employee_id')[$i];
                    //         $abstract_sign->rank = $request->input('rank')[$i];
                    //         $abstract_sign->save();
                    //     }
                    // }

                    $data['supplier_c'] = $supplier_c;
                    $data['test_x'] = $test_x;
                    $data['uprice_x'] = $uprice_x;
                }else{
                    $data['status'] = 0;
                    $validator->errors()->add('supplier_desc', 'Please make sure to check a supplier for all the purchase items.');
                    $data['errors'] = $validator->messages();
                }
            }else{
                $data['status'] = 0;
                $validator->errors()->add('supplier_desc', 'Supplier/s must be unique');
                $data['errors'] = $validator->messages();
            }

        }
        return $data;
    }

    public function get_abstrct(Request $request){
        $itemsx = DB::table('olongapo_absctrct')
                                ->where('olongapo_absctrct.id','=',$request->input('pr_no'))
                                ->first();

        $remarks = DB::table('olongapo_purchase_request_no')->select('remarks')->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)->first();

        $items = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                            ->leftjoin('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->leftjoin('olongapo_obr','olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                            ->leftjoin('olongapo_absctrct','olongapo_absctrct.prno_id','=','olongapo_purchase_request_items.prno_id')
                            ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty',
                                    'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_count as prno_count','olongapo_purchase_request_no.pr_no',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.dept_desc',
                                    'olongapo_obr.obr_no','olongapo_obr.obr_date',

                                    'olongapo_absctrct.control_no' , 'olongapo_absctrct.abstrct_date',
                                    'olongapo_purchase_request_no.proc_type'
                                    ])
                            ->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)
                            ->where('olongapo_purchase_request_items.deleted_at','=',NULL)
                            ->get();

        $suppliers = DB::table('olongapo_absctrct')
                                        ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.abstrct_id','=','olongapo_absctrct.id')
                                        ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                                        ->select([
                                                    'olongapo_absctrct_pubbid.id as pubbid_id',
                                                    'supplier_info.title','supplier_info.id',
                                            ])
                                        ->where('olongapo_absctrct.prno_id','=',$itemsx->prno_id)
                                        ->groupby('supplier_info.id')
                                        ->orderby('olongapo_absctrct_pubbid.id', 'asc')
                                        ->get();

        $list = DB::table('olongapo_absctrct')
                                        ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.abstrct_id','=','olongapo_absctrct.id')
                                        ->join('olongapo_absctrct_pubbid_item_suppbid','olongapo_absctrct_pubbid_item_suppbid.absctrct_id','=','olongapo_absctrct.id')
                                        ->select([  'olongapo_absctrct.id as abstrct_id',
                                                    'olongapo_absctrct_pubbid.id as pubbid_id',
                                                    'olongapo_absctrct_pubbid_item_suppbid.pubbid_id','olongapo_absctrct_pubbid_item_suppbid.pr_item_id','olongapo_absctrct_pubbid_item_suppbid.id as suppbid_id','olongapo_absctrct_pubbid_item_suppbid.unit_price','olongapo_absctrct_pubbid_item_suppbid.total_price'
                                            ])
                                        ->where('olongapo_absctrct.prno_id','=',$itemsx->prno_id)
                                        ->groupby('olongapo_absctrct_pubbid_item_suppbid.id')
                                        ->get();

        $th = '';
        $sub_th = '<td colspan="5">ITEMS</td>';

        $countx = 1;
        $th2 = '';
        for($s = 0;$s<count($suppliers);$s++){
            $th .= '<th colspan="3" class="suppliers" id="suppliers_'.$suppliers[$s]->pubbid_id.'">
                        <input type="text" class="form-control item_supplier" data-index="'.$s.'" name="supplier_desc['.$s.']" placeholder="Supplier Description" value="'.$suppliers[$s]->title.'" autocomplete="off">
                        <input type="hidden" name="supplier_id['.$s.']" id="supplier_id_'.$s.'" value="'.$suppliers[$s]->id.'">
                        <input type="hidden" name="pubbid_id['.$s.']" id="pubbid_id'.$s.'" value="'.$suppliers[$s]->pubbid_id.'">
                       <input type="checkbox" name="delete_id[]" value="'.$suppliers[$s]->pubbid_id.'" data-column="'.$s.'" class="delete_supplier"> Remove
                    </th>';
             $th2 .= '<th colspan="3" class="suppliers th_'.$suppliers[$s]->pubbid_id.'">'.$suppliers[$s]->title.'</th>';
             $sub_th .= '<td class="th_'.$suppliers[$s]->pubbid_id.'">Unit Price</td>
                         <td class="th_'.$suppliers[$s]->pubbid_id.'">Total Price</td>
                         <td class="th_'.$suppliers[$s]->pubbid_id.'"></td>';
        }

        $td[]="";
        for($i=0;$i<count( $items);$i++){
            $listx = DB::table('olongapo_absctrct_pubbid_item_suppbid')
                                ->join('olongapo_purchase_request_items','olongapo_purchase_request_items.id','=','olongapo_absctrct_pubbid_item_suppbid.pr_item_id')
                                ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_item_suppbid.pubbid_id')
                                ->select([
                                        'olongapo_absctrct_pubbid_item_suppbid.unit_price',
                                        'olongapo_absctrct_pubbid_item_suppbid.total_price',
                                        'olongapo_absctrct_pubbid_item_suppbid.pubbid_id',
                                        'olongapo_absctrct_pubbid.supplier_id',
                                        'olongapo_purchase_request_items.qty',
                                        'olongapo_absctrct_pubbid_item_suppbid.pr_item_id'
                                ])
                                ->where('pr_item_id','=',$items[$i]->item_id)
                                ->orderby('olongapo_absctrct_pubbid.id', 'asc')
                                ->get();

            if($listx->count()){
            $tdx = '';
             for($a = 0;$a<count($listx);$a++){
                    $total_pricex = ($listx[$a]->unit_price*$listx[$a]->qty);
                    $total_price = round($total_pricex,2);

                    $supplier_app = 0;
                    $approved =  DB::table('olongapo_absctrct_pubbid_apprved')
                                    ->join('olongapo_absctrct_pubbid', 'olongapo_absctrct_pubbid.id', '=', 'olongapo_absctrct_pubbid_apprved.pubbid')
                                    ->select(['olongapo_absctrct_pubbid.supplier_id'])
                                    ->where('olongapo_absctrct_pubbid_apprved.pr_no', '=', $itemsx->prno_id)
                                    ->where('olongapo_absctrct_pubbid_apprved.pr_item_id', '=',$listx[$a]->pr_item_id)
                                    ->where('olongapo_absctrct_pubbid.supplier_id', '=', $listx[$a]->supplier_id)
                                    ->get();

                    if(count($approved) > 0){
                        $supplier_app = $approved[0]->supplier_id;
                    }

                    $tdx .= '<td class="th_'.$listx[$a]->pubbid_id.' '.($supplier_app > 0 ? 'select_supplier' : '').'" >
                                <input class="form-control unit_price number" type="text" data-x="'.$i.'" data-index="'.$a.'" name="item_price['.$i.']['.$a.']"  value="'.number_format($listx[$a]->unit_price, 2).' " />
                            </td>
                            <td class="th_'.$listx[$a]->pubbid_id.' '.($supplier_app > 0 ? 'select_supplier' : '').'">
                                <input  class="form-control" type="text" disabled="true"  name="item_toprice['.$i.']['.$a.']" value="'.number_format($total_price, 2).'" />
                            </td>
                            <td class="th_'.$listx[$a]->pubbid_id.' '.($supplier_app > 0 ? 'select_supplier' : '').'">
                                <input type="checkbox" name="supplier_item['.$i.']['.$a.']"  onclick="$(this).highlightAmount('.$i.', '.$a.');" class="supplier_row_'.$i.' supplier_column_'.$a.' supplier_checkbox" value="1" '.($supplier_app > 0 ? 'checked="checked"' : 'disabled="disabled"').'/>
                            </td>';
                }
                $td[$i] = $tdx;

            }else{
                $tdx = '';
                for($a = 0;$a<count($suppliers);$a++){
                   $tdx .= '<td><input class="form-control unit_price" data-x="'.$i.'" data-index="'.$a.'" name="item_price['.$i.']['.$a.']" type="text" /></td><td><input  class="form-control" disabled="true" name="item_toprice['.$i.']['.$a.']" type="text" /></td>';
                }
                $td[$i] = $tdx;

            }
        }

        // $signee = DB::table('olongapo_absctrct_signee')
        //                                 ->join('olongapo_employee_list', 'olongapo_employee_list.id', '=', 'olongapo_absctrct_signee.employee_id')
        //                                 ->leftjoin('olongapo_position', 'olongapo_position.id', '=', 'olongapo_employee_list.position_id')
        //                                 ->select([
        //                                     'olongapo_absctrct_signee.rank',
        //                                     'olongapo_employee_list.fname',
        //                                     'olongapo_employee_list.mname',
        //                                     'olongapo_employee_list.lname',
        //                                     'olongapo_employee_list.ename',
        //                                     'olongapo_absctrct_signee.employee_id'
        //                                 ])
        //                                 ->orderBy('olongapo_absctrct_signee.rank', 'asc')
        //                                 ->get();

        $data['suppliers'] = $th ;
        $data['subth'] = $sub_th ;

        $data['suppliers_clean'] = $th2;

        $data['suppliersx'] = $suppliers;
        // $data['signee'] = $signee;


        $data['list'] = $td;
        $data['list2'] = $list;
        $data['items'] = $items;
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

    public function absctrct_list_update(Request $request){


        $validator = Validator::make($request->all(), [
                        'old_control_no' => 'required|exists:olongapo_absctrct,control_no',
                        'supplier_desc.*' => 'required',
                        'item_price.*.*' => 'required'
                    ],
                    [
                        'old_control_no.required'      => 'Please Refresh and try again.',
                        'old_control_no.exists'        => 'Please Refresh and try again.'
                    ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            if(count($request->input('supplier_id')) === count(array_unique($request->input('supplier_id')))){
                if(count($request->input('supplier_item')) === count($request->input('item_id'))){
                    $data['status'] = 1;
                    $Abstrct = Abstrct::where('control_no','=',$request->input('old_control_no'))->first();

                    $Abstrct->control_no = $request->input('absctrct_no');
                    $Abstrct->abstrct_date = $request->input('absctrct_date');
                    $Abstrct->save();

                    $purchasereq = PurchaseNo::where('id', '=', $request['pr_id_update'])->first();
                    $purchasereq->proc_type = $request['proc_type'];
                    $purchasereq->save();

                    ##abstract signee
                    // $result = AbstrctSignee::all();
                    // if(count($result) == 0){
                    //     for ($i=0; $i < count($request->input('employee_id')); $i++) {
                    //         $abstract_sign = new AbstrctSignee;
                    //         $abstract_sign->employee_id = $request->input('employee_id')[$i];
                    //         $abstract_sign->rank = $request->input('rank')[$i];
                    //         $abstract_sign->save();
                    //     }
                    // }else{
                    //     for ($i=0; $i < count($request->input('employee_id')); $i++) {
                    //         $count = AbstrctSignee::where('rank', '=', $request->input('rank')[$i])->first();
                    //         if(count($count) == 0){
                    //             $abstract_sign = new AbstrctSignee;
                    //         }else{
                    //             $abstract_sign = AbstrctSignee::where('rank', '=', $request->input('rank')[$i])->first();
                    //         }
                    //         $abstract_sign->employee_id = $request->input('employee_id')[$i];
                    //         $abstract_sign->rank = $request->input('rank')[$i];
                    //         $abstract_sign->save();
                    //     }
                    // }

                    for($y=0;$y<count($request['pubbid_id']);$y++){
                        if($request['pubbid_id.'.$y]){
                            $data['update_supp'][$y] = $request['pubbid_id.'.$y];
                            $AbstrctSupplier = AbstrctSupplier::find($request['pubbid_id.'.$y]);
                            $AbstrctSupplier->supplier_id = $request['supplier_id.'.$y];
                            $AbstrctSupplier->abstrct_id = $Abstrct->id;
                            $AbstrctSupplier->save();
                        }else{
                            $data['add_supp'][$y] = $request['pubbid_id.'.$y];
                            $AbstrctSupplier = new AbstrctSupplier;
                            $AbstrctSupplier->supplier_id = $request['supplier_id.'.$y];
                            $AbstrctSupplier->abstrct_id = $Abstrct->id;
                            $AbstrctSupplier->save();
                        }

                        $abstract_latest_id = 0;

                        for($x=0;$x<$request['items_num'];$x++){
                            $price = str_replace(',', '', $request['item_price.'.$x.'.'.$y]);

                            $AbstrctItems = AbstrctItems::where('absctrct_id','=',$Abstrct->id)
                                                                    ->where('pr_item_id','=',$request['item_id.'.$x])
                                                                    ->where('pubbid_id','=',$AbstrctSupplier->id)
                                                                    ->first();
                            if($AbstrctItems){
                                $AbstrctItems->unit_price = $price;
                                $AbstrctItems->total_price = ($price*$request['qty.'.$x]);
                                $AbstrctItems->save();

                            }else{
                                $AbstrctItems = new AbstrctItems;
                                $AbstrctItems->absctrct_id = $Abstrct->id;
                                $AbstrctItems->pr_item_id = $request['item_id.'.$x];
                                $AbstrctItems->pubbid_id = $AbstrctSupplier->id;
                                $AbstrctItems->unit_price = $price;
                                $AbstrctItems->total_price = ($price*$request['qty.'.$x]);
                                $AbstrctItems->save();
                            }

                            $abstract_latest_id = $AbstrctItems->id;

                            $data['item_price.'][$x][$y] = ($price*$request['qty.'.$x]);

                            ##update supplier approved
                            $abstract_supp =  DB::table('olongapo_absctrct_pubbid_apprved')
                                                ->join('olongapo_absctrct_pubbid', 'olongapo_absctrct_pubbid.id', '=', 'olongapo_absctrct_pubbid_apprved.pubbid')
                                                ->where('olongapo_absctrct_pubbid_apprved.pr_no', '=', $request['pr_id_update'])
                                                ->where('olongapo_absctrct_pubbid_apprved.pr_item_id', '=', $request['item_id.'.$x])
                                                ->get();

                            if(count($abstract_supp) > 0){
                                if($request['supplier_item.'.$x.'.'.$y] == 1){
                                    $AbstrctSupplierApprved = AbstrctSupplierApprved::where('pr_no', '=', $request['pr_id_update'])
                                                                ->where('pr_item_id', '=', $request['item_id.'.$x])
                                                                ->first();
                                    $AbstrctSupplierApprved->pubbid = $AbstrctSupplier->id;
                                    $AbstrctSupplierApprved->suppbid = $abstract_latest_id;
                                    $AbstrctSupplierApprved->save();
                                }
                            }else{
                                if($request['supplier_item.'.$x.'.'.$y] == 1){
                                    $AbstrctSupplierApprved = new AbstrctSupplierApprved;
                                    $AbstrctSupplierApprved->pr_no = $request['pr_id_update'];
                                    $AbstrctSupplierApprved->pr_item_id = $request['item_id.'.$x];
                                    $AbstrctSupplierApprved->suppbid = $abstract_latest_id;
                                    $AbstrctSupplierApprved->pubbid = $AbstrctSupplier->id;
                                    $AbstrctSupplierApprved->date = date('y-m-d');
                                    $AbstrctSupplierApprved->save();
                                }
                            }
                        }
                    }

                    if(count($request['delete_id']) > 0){
                        for ($a=0; $a < count($request['delete_id']); $a++) {
                            $AbstrctItems2 = AbstrctItems::where('pubbid_id','=',$request['delete_id'][$a])->delete();
                            // $AbstrctItems2->delete();

                            // var_dump($AbstrctItems2);
                            $AbstrctSupplier2 = AbstrctSupplier::find($request['delete_id'][$a]);
                            $AbstrctSupplier2->delete();
                        }
                    }
                    $data['errors'] = $request->all();
                }else{
                    $data['status'] = 0;
                    $validator->errors()->add('supplier_desc', 'Please make sure to check a supplier for all the purchase items.');
                    $data['errors'] = $validator->messages();
                }
            }else{
                $data['status'] = 0;
                $validator->errors()->add('supplier_desc', 'Supplier/s must be unique');
                $data['errors'] = $validator->messages();
            }


        }
        return $data;
    }

    public function absctrct_list_pdf(Request $request)
    {

        $itemsx = DB::table('olongapo_absctrct')
                                ->where('olongapo_absctrct.id','=',$request->input('pr_no'))
                                ->first();

        $remarks = DB::table('olongapo_purchase_request_no')->select('remarks')->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)->first();

        $items = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                            ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->leftjoin('olongapo_obr','olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                            ->leftjoin('olongapo_absctrct','olongapo_absctrct.prno_id','=','olongapo_purchase_request_items.prno_id')
                            ->leftjoin('olongapo_procurement_method','olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                            ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.pr_item_id','=','olongapo_purchase_request_items.id')
                            ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                            ->select([
                                    'olongapo_purchase_request_items.id as item_id',
                                    'olongapo_purchase_request_items.description',
                                    'olongapo_purchase_request_items.remarks',
                                    'olongapo_purchase_request_items.unit',
                                    'olongapo_purchase_request_items.qty',
                                    'olongapo_purchase_request_no.id as prno_id',
                                    'olongapo_purchase_request_no.dept_id as prno_dept',
                                    'olongapo_purchase_request_no.pr_date as prno_date',
                                    'olongapo_purchase_request_no.pr_count as prno_count',
                                    'olongapo_purchase_request_no.pr_no',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code',
                                    'olongapo_subdepartment.dept_desc',
                                    'olongapo_obr.obr_no','olongapo_obr.obr_date',
                                    'olongapo_absctrct.control_no' ,
                                    'olongapo_absctrct.abstrct_date',
                                    'olongapo_procurement_method.proc_title',
                                    'olongapo_absctrct_pubbid.supplier_id'
                                    ])
                            ->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)
                            ->where('olongapo_purchase_request_items.deleted_at','=',NULL)
                            ->groupby('olongapo_purchase_request_items.id')
                            ->orderby('olongapo_absctrct_pubbid.supplier_id', 'asc')
                            ->orderby('olongapo_purchase_request_items.id', 'asc')
                            ->get();

        $suppliers = DB::table('olongapo_absctrct')
                                        ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.abstrct_id','=','olongapo_absctrct.id')
                                        ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                                        ->select([
                                                    'olongapo_absctrct_pubbid.id as pubbid_id',
                                                    'supplier_info.title','supplier_info.id',
                                            ])
                                        ->where('olongapo_absctrct.prno_id','=',$itemsx->prno_id)
                                        ->get();

        $supplier_total = DB::table('olongapo_absctrct_pubbid_item_suppbid')
                                    ->join('olongapo_absctrct', 'olongapo_absctrct.id', '=', 'olongapo_absctrct_pubbid_item_suppbid.absctrct_id' )
                                    ->select(DB::raw('SUM(olongapo_absctrct_pubbid_item_suppbid.total_price) as subtotal'))
                                     ->where('olongapo_absctrct.prno_id','=',$itemsx->prno_id)
                                    ->groupBy('olongapo_absctrct_pubbid_item_suppbid.pubbid_id')
                                    ->get();

        $list = DB::table('olongapo_absctrct')
                                        ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.abstrct_id','=','olongapo_absctrct.id')
                                        ->join('olongapo_absctrct_pubbid_item_suppbid','olongapo_absctrct_pubbid_item_suppbid.absctrct_id','=','olongapo_absctrct.id')
                                        ->select([  'olongapo_absctrct.id as abstrct_id',
                                                    'olongapo_absctrct_pubbid.id as pubbid_id',
                                                    'olongapo_absctrct_pubbid_item_suppbid.pubbid_id',
                                                    'olongapo_absctrct_pubbid_item_suppbid.pr_item_id',
                                                    'olongapo_absctrct_pubbid_item_suppbid.id as suppbid_id',
                                                    'olongapo_absctrct_pubbid_item_suppbid.unit_price'
                                            ])
                                        ->where('olongapo_absctrct.prno_id','=',$itemsx->prno_id)
                                        ->groupby('olongapo_absctrct_pubbid_item_suppbid.id')
                                        ->get();

        $signee = DB::table('olongapo_absctrct_signee')->get();
        $data['approved_by_req'] = Requestordersignee::where('deleted_at','=',null)->get();

        $th = '';
        $sub_th = '';
        $countx = 1;
        $th2 = '';
        $subtotal_array = "";


        for($s = 0;$s<count($suppliers);$s++){
            $th2 .= '<th colspan="2" class="suppliers" style="text-align: center;">'.$suppliers[$s]->title.'</th>';
            $sub_th .= '<th>Unit Price</th><th>Total Price</th>';
        }



        $td[]="";
        for($i=0;$i<count( $items);$i++){
            $listx = DB::table('olongapo_absctrct_pubbid_item_suppbid')
                                ->join('olongapo_purchase_request_items','olongapo_purchase_request_items.id','=','olongapo_absctrct_pubbid_item_suppbid.pr_item_id')
                                ->where('pr_item_id','=',$items[$i]->item_id)
                                ->select([
                                        'olongapo_absctrct_pubbid_item_suppbid.unit_price',
                                        'olongapo_absctrct_pubbid_item_suppbid.total_price',
                                        'olongapo_absctrct_pubbid_item_suppbid.pubbid_id',
                                        'olongapo_purchase_request_items.qty',
                                ])
                                ->orderby('olongapo_purchase_request_items.id', 'asc')
                                ->get();

            if($listx->count()){
                $tdx = '';
                for($s = 0;$s<count($listx);$s++){
                    $total_pricex = ($listx[$s]->unit_price*$listx[$s]->qty);
                    $total_price = round($total_pricex,2);
                    $tdx .= '<td style="text-align: right;">'.number_format($listx[$s]->unit_price, 2).'</td><td style="text-align: right;">'.number_format($total_price, 2).'</td>';
                }
                $td[$i] = $tdx;
            }
        }

        $data['suppliers'] = $th ;
        $data['subth'] = $sub_th ;

        $data['suppliers_clean'] = $th2 ;

        $data['suppliersx'] = $suppliers ;

        $data['list'] = $td;

        $data['list2'] = $list;
        $data['items'] = $items;
        $data['signee'] = $signee;
        $data['subtotal'] = $supplier_total;

        $awards_given = "";

        $supplier_grp =  DB::table('olongapo_absctrct_pubbid_apprved')
                            ->join('olongapo_absctrct_pubbid', 'olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                            ->where('olongapo_absctrct_pubbid_apprved.pr_no', '=', $itemsx->prno_id)
                            ->groupby('olongapo_absctrct_pubbid.supplier_id')
                            ->orderby('olongapo_absctrct_pubbid.supplier_id', 'asc')
                            ->get();

        if(count($supplier_grp) == 1){
            $supplier_id = $supplier_grp[0]->supplier_id;
            $supplier_data = DB::table('supplier_info')->where('id', '=', $supplier_id)->get();
            $awards_given .= '<u>'.$supplier_data[0]->title.'</u> on item nos. <u>1 to '.count($items).'</u>';
        }else{
            $s_count = 0;
                $c_items = 0;

            foreach($supplier_grp as $key=>$s){

                $itemss = DB::table('olongapo_purchase_request_items')
                            ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.pr_item_id','=','olongapo_purchase_request_items.id')
                            ->join('olongapo_absctrct_pubbid', 'olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                            ->where('olongapo_absctrct_pubbid.supplier_id', '=', $s->supplier_id)
                            ->orderby('olongapo_absctrct_pubbid.supplier_id', 'asc')
                            ->orderby('olongapo_purchase_request_items.id', 'asc')
                            ->get();
                $supplier_data = DB::table('supplier_info')->where('id', '=', $itemss[0]->supplier_id)->get();
                            // var_dump($itemss[0]->supplier_id);
                            // var_dump($supplier_data[0]->title);

                if(count($itemss) > 0){
                    $c_items += count($itemss);
                    if($key == 0){
                        $s_count = 1;
                    }
                    $awards_given .= '<u>'.$supplier_data[0]->title.'</u> on item nos. <u>'.($s_count).' to '.$c_items.'</u>, ';
                    $s_count = $c_items+1;
                }

            }

        }
// die();
        $data['committee'] = db::table('olongapo_bac_awards_committee')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee.employee_bacposition')
                                        ->select([

                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee.deleted_at','=',null)
                                        ->get();
        $data['approved_by'] = db::table('olongapo_bac_awards_committee_approved_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_approved_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_approved_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_approved_by.deleted_at','=',null)
                                        ->get();

        $data['awards_given'] = $awards_given;

        $pdf = PDF::loadView('abstrct::abstrct.absctrct_list_pdf',$data);
        $pdf->setPaper('Legal', 'landscape');
        return @$pdf->stream();
    }

    public function delete_abstract(Request $request)
    {

        $data['abstract_items'] = DB::table('olongapo_absctrct_pubbid_item_suppbid')->where('absctrct_id','=', $request->input('abstrct_id'))->delete();
        $data['abstract_apprv'] = DB::table('olongapo_absctrct_pubbid_apprved')->where('pr_no','=', $request->input('prno_id'))->delete();
        $data['abstract_pub'] = DB::table('olongapo_absctrct_pubbid')->where('abstrct_id','=', $request->input('abstrct_id'))->delete();
        $data['abstract'] = DB::table('olongapo_absctrct')->where('id','=', $request->input('abstrct_id'))->delete();

        return $data;
    }


}
