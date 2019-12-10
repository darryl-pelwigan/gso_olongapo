<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Inventory\Entities\InventoryInfo;
use Modules\Inventory\Entities\InvoiceInfo;
use Modules\Inventory\Entities\InventoryItems;
use Modules\BAC\Entities\BacControlInfo;



class InventoryController extends Controller
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
        return view('inventory::inventory.index',$this->setup());
    }

    public function inventory()
    {
        return view('inventory::inventory.index',$this->setup());
    }

    public function items()
    {

        $this->data['items'] = DB::table('inventory_items')
             // ->join('inv_gsoprop_code_list','inv_gsoprop_code_list.id','=','inventory_items.item_code')
             ->get()
             ->all();
        // dd($this->data['items']);
        return view('inventory::inventory.items',$this->setup());
    }

    public function in_out_items($id){

        $this->data['items'] = InventoryItems::find($id);
        // dd($id);
        return view('inventory::inventory.in_out',$this->setup());
    }

    public function add_control_number(Request $request){
         $validator = Validator::make($request->all(), [
                    'accountable_id' => 'required|exists:olongapo_employee_list,id',
                    'inv_control_no' => 'required|unique:inventory_info,control_no',
                    'pono_id' =>'required|unique:inventory_info,purchase_order_no',
                    'inv_date' => 'required|date',
                    'inv_invoice_date' => 'required|date',
                    'item_date_aquired.*' => 'required|date',
                    'item_desc.*' => 'required',
                    'item_price.*' => 'required',
                    'item_desc.*' => 'required',
                    'item_propcatcode.*' => 'required|exists:inv_ppe_code_subcategory,desc',
                    'item_propitemcode.*' => 'required|exists:inv_ppe_code_list,desc'
            ],[
                   'accountable_id.required' => 'The Accountable Person is required.',
                   'accountable_id.exists' => 'The Accountable Person doesnt exists.',
                   'inv_control_no.required' => 'The Inventory Control Number is required.',
                   'inv_control_no.exists' => 'The Inventory Control Number must be unique.',
                   'pono_id.required' => 'Purchae order invalid please try again.',
                   'inv_date.required' => 'Inventory Date is Required.',
                   'inv_date.date' => 'Inventroy date must be a valida Date.',
                   'inv_invoice_date.required' => 'Invoice date Date is Required.',
                   'inv_invoice_date.date' => 'Invoice date must be a valida Date.',
                   'item_date_aquired.*.required' => 'The Item Date Acquired is required.',
                   'item_desc.*.required' => 'The Item Description is required.',
                   'item_price.*.required' => 'The Item Price is required.',
                   'inv_ppe_code_subcategory.exists' => 'The Property Category doesnt exists.',
                   'inv_ppe_code_subcategory.required' => 'The Property Category is required.',
                   'inv_ppe_code_subcategory.exists' => 'The Property Category doesnt exists.',
                   'inv_ppe_code_subcategory.required' => 'The Property Category is required.',
                   'item_propitemcode.exists' => 'The Property Item Code doesnt exists.',
                   'item_propitemcode.required' => 'The Property Item Code is required.',
            ]);


           if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();

            }else{
                $invoice = new InvoiceInfo;
                $invoice->invoice_supplier_id = $request->input('supplier_id');
                $invoice->date_invoice = $request->input('inv_invoice_date');
                $invoice->invoice_desc = $request->input('inv_control_no');
                $invoice->save();

                $inventory = new InventoryInfo;
                $inventory->control_no = $request->input('inv_control_no');
                $inventory->purchase_order_no = $request->input('pono_id');
                $inventory->invoice_no = $invoice->id;
                $inventory->accountable_id =  $request->input('accountable_id');
                $inventory->inv_date = $request->input('inv_date');
                $inventory->save();
                for( $x = 1; $x<=count($request->input('item_desc')); $x++ ){
                    $item_propitemcode = DB::table('inv_ppe_code_list')->where('desc','=',$request->input('item_propitemcode')[$x])->first();
                    $item_price = (float) (str_replace(',','',$request->input('item_price')[$x]));
                    $total_value = $item_price*$request->input('item_qty')[$x];
                    $items = new InventoryItems;
                    $items->inventory_info_id = $inventory->id;
                    $items->item_desc = $request->input('item_desc')[$x];
                    $items->item_unit = $request->input('item_unit')[$x];
                    $items->item_qty  = $request->input('item_qty')[$x];
                    $items->item_cat_code  = $item_propitemcode->ppe_cat_id;
                    $items->item_subcat_code  = $item_propitemcode->ppe_subcat_id;
                    $items->item_code  = $item_propitemcode->id;
                    $items->life_span  = $request->input('item_lifespan')[$x];
                    $items->date_acquired  = $request->input('item_date_aquired')[$x];
                    $items->unit_value  = $item_price;
                    $items->total_value  = $total_value;
                    $items->accountable_id  = $request->input('accountable_id');
                    $items->accountable_id  = $request->input('accountable_id');
                    $items->save();
                }
                $data['status'] = 1;
                $data['errors'] = 'Successfull';
            }

            return $data;
    }


}
