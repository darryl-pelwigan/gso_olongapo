<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\BAC\Entities\BacControlInfo ;
class BacAbstrctController extends Controller
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


    public function absctrct_list()
    {
        return view('bac::bac.abstrct-list',$this->setup());
    }

    public function get_abstrct(Request $request){

         $bac_type = DB::table('olongapo_bac_type')
                                ->get();


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
                            ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty',
                                    'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_count as prno_count','olongapo_purchase_request_no.pr_no',
                                    'olongapo_department.dept_code',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.dept_desc',
                                    'olongapo_obr.obr_no','olongapo_obr.obr_date',

                                    'olongapo_absctrct.control_no' , 'olongapo_absctrct.abstrct_date',
                                    ])
                            ->where('olongapo_purchase_request_no.id','=',$itemsx->prno_id)
                            ->where('olongapo_purchase_request_items.deleted_at','=',NULL)
                            ->get();

        $suppliers = DB::table('olongapo_absctrct')
                                        ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.abstrct_id','=','olongapo_absctrct.id')
                                        ->join('olongapo_absctrct_pubbid_item_suppbid','olongapo_absctrct_pubbid_item_suppbid.absctrct_id','=','olongapo_absctrct.id')
                                        ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                                        ->select([
                                                    'olongapo_absctrct_pubbid.id as pubbid_id',
                                                    'supplier_info.title','supplier_info.id',
                                            ])
                                        ->where('olongapo_absctrct.prno_id','=',$itemsx->prno_id)
                                        ->groupby('supplier_info.id')
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
                $th_td = '';
                $countx = 1;
                for($s = 0;$s<count($suppliers);$s++){
                    // $th .= '<th colspan="2" class="suppliers"><input type="text" class="form-control item_supplier" data-index="'.$s.'" name="supplier_desc['.$s.']" placeholder="Supplier Description" value="'.$suppliers[$s]->title.'" autocomplete="off"> <input type="hidden" name="supplier_id['.$s.']" id="supplier_id_'.$s.'" value="'.$suppliers[$s]->id.'"><input type="hidden" name="pubbid_id['.$s.']" id="pubbid_id'.$s.'" value="'.$suppliers[$s]->pubbid_id.'"></th>';
                    $th .= '<th colspan="2" class="suppliers">
                                                            '.$suppliers[$s]->title.'
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="supplier_approved" id="pubbid_id'.$s.'" value="'.$suppliers[$s]->pubbid_id.'">
                                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok-sign"></i></span>
                                                                </label>
                                                            </div>
                            </th>';
                    $th_td .= '<td>Unit Price</td><td>Total Price</td>';

                }
                $unit_price_ttl = [];
                $total_price_ttl = [];
                $c = count($suppliers);
                for($i=0;$i<count( $items);$i++){
                    $listx = DB::table('olongapo_absctrct_pubbid_item_suppbid')
                                        ->join('olongapo_purchase_request_items','olongapo_purchase_request_items.id','=','olongapo_absctrct_pubbid_item_suppbid.pr_item_id')
                                        ->where('pr_item_id','=',$items[$i]->item_id)
                                        ->get();
                                        $tdx = '';

                                        if($listx->count()){
                                            $cc = [];
                                            for($s = 0;$s<count($suppliers);$s++){
                                                $total_pricex = ($listx[$s]->unit_price*$listx[$s]->qty);
                                                $total_price = round($total_pricex,2);
                                                $tdx .= '<td>'.$listx[$s]->unit_price.'</td><td>'.$total_price.'</td>';
                                                $unit_price_ttl[$s][$i] = $listx[$s]->unit_price;
                                                $total_price_ttl[$s][$i] = $total_price;
                                            }
                                            $td[$i] = $tdx;

                                        }else{
                                            for($s = 0;$s<count($suppliers);$s++){
                                               $tdx .= '<td></td><td></td>';
                                            }


                                        }

                    }
                    $total_ut = '';
                    for($s = 0;$s<count($suppliers);$s++){
                        $unit_price_ttl[$s] = array_sum($unit_price_ttl[$s]);
                        $total_price_ttl[$s] = array_sum($total_price_ttl[$s]);

                        $total_ut .=    '<td colspan="2" class="text-center">
                                            '.number_format($total_price_ttl[$s],2).'
                                            <input type="hidden" name="supplier_totalprice['.$suppliers[$s]->pubbid_id.']" value="'.$total_price_ttl[$s].'" />
                                        </td>';
                    }
                    $total_tr = '<tr class="total_ut">
                                    <td colspan="4">TOTAL</td>
                                    <td>PHP</td>
                                    '.$total_ut.'
                            </tr>';
                            $bac_type_o = '';
                for($i=0;$i<count($bac_type);$i++){
                        $bac_type_o .= '<option value="'.$bac_type[$i]->id.'">'.$bac_type[$i]->description.'</option>';
                }

                $data['bac_type_o'] = $bac_type_o ;
                $data['total_tr'] = $total_tr ;
                $data['suppliers'] = $th ;
                $data['unit_total'] = $th_td ;
                $data['suppliersx'] = $suppliers ;

                $data['list'] = $td;
                $data['list2'] = $list;
                $data['items'] = $items;
                var_dump($items);
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

    public function process_abstrct(Request $request){
       $validator = Validator::make($request->all(),
            [
                'bac_date'              => 'required|date',
                'bac_control_no'        => 'required|unique:olongapo_bac_control_info,bac_control_no',
                'sof_id'                =>  'required|exists:olongapo_bac_source_fund,id',
                'bac_reso_type'         => 'required',
                'bac_categ_id'          => 'required|exists:olongapo_bac_category,id',
                'supplier_approved'     => 'required|exists:olongapo_absctrct_pubbid,id',
                'pr_id_update'          => 'required|unique:olongapo_bac_control_info,prno_id',
            ],
            [
                   'bac_date.required'          => 'BAC DATE is required',
                   'bac_control_no.required'    => 'BAC CONTROL NO. is required',
                   'bac_control_no.unique'      => 'BAC CONTROL NO. must be unique.',
                   'pr_id_update.required'    => 'BAC CONTROL NO. is required',
                   'pr_id_update.unique'      => 'BAC CONTROL NO. must be unique.',
                   'sof_id.required'            => 'Please Specify Source of Fund',
                   'sof_id.exists'              => 'Source of Fund doesn\'t exists ',
                   'bac_categ_id.required'      => 'BAC CATEGORY is required',
                   'bac_categ_id.exists'        => 'BAC CATEGORY doesn\'t exists ',
                   'supplier_approved.required'      => 'Pleace choose a supplier.',
                   'supplier_approved.exists'        => 'Error Encountered Please refresh and try again'
            ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 1;
            $data['errors'] =  'Successfully Proceess BAC';
            $BacControlInfo = new BacControlInfo;
            $BacControlInfo->bac_control_no     = $request['bac_control_no'];
            $BacControlInfo->prno_id            = $request['pr_id_update'];
            $BacControlInfo->bac_date           = $request['bac_date'];
            $BacControlInfo->amount             = $request['supplier_totalprice.'.$request['supplier_approved']];
            $BacControlInfo->sourcefund_id      = $request['sof_id'];
            $BacControlInfo->category_id        = $request['bac_categ_id'];
            $BacControlInfo->apprved_pubbid_id  = $request['supplier_approved'];
            $BacControlInfo->bac_type_id        = $request['bac_reso_type'];
            $BacControlInfo->save();

        }
        return $data;
    }


    public function get_pr(Request $request){

        $info = DB::table('olongapo_absctrct_pubbid')
                    ->join('olongapo_absctrct' , 'olongapo_absctrct.id','=','olongapo_absctrct_pubbid.abstrct_id')
                    ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_absctrct.prno_id')
                    ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                    ->leftjoin('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                    ->leftjoin('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                    ->leftjoin('olongapo_absctrct_pubbid_apprved' , 'olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                    ->leftjoin('olongapo_bac_control_info' , 'olongapo_bac_control_info.apprved_pubbid_id','=','olongapo_absctrct_pubbid.id')
                    ->leftjoin('olongapo_procurement_method' , 'olongapo_procurement_method.id','=','olongapo_purchase_request_no.proc_type')
                    ->leftjoin('olongapo_bac_category' , 'olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                    ->leftjoin('supplier_info' , 'supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                    ->leftjoin('olongapo_bac_source_fund' , 'olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                    ->select([
                                'olongapo_subdepartment.dept_desc as dept_desc',
                                'olongapo_subdepartment.id as dept_id',
                                'olongapo_department.dept_code as dept_code',
                                'olongapo_purchase_request_no.id as prno_id',
                                'olongapo_purchase_request_no.pr_no',
                                'olongapo_purchase_request_no.pr_date',
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
                                'olongapo_absctrct_pubbid.id as apprved_pubbid_id'
                            ])
                    ->where('olongapo_absctrct_pubbid.id','=',$request->input('abstrct_id'))
                    ->groupby('olongapo_absctrct_pubbid.supplier_id')
                    ->first();


        $items_bac = DB::table('olongapo_absctrct_pubbid as pubbid')
                    ->leftjoin('olongapo_absctrct_pubbid_apprved as approved' , 'pubbid.id','=','approved.pubbid')
                    ->leftjoin('olongapo_absctrct_pubbid_item_suppbid as suppbid','suppbid.id','=','approved.suppbid')
                    ->leftjoin('olongapo_purchase_request_items as items','items.id','=','suppbid.pr_item_id')
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
                    ->where('pubbid.id','=',$request->input('abstrct_id'))
                    ->get();

        $data['itemsx'] = $items_bac;
        $data['info']  = $info;

        return $data;


    }


}
