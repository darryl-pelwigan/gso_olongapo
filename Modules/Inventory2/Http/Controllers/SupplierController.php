<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Inventory\Entities\Supplier;
use Modules\Inventory\Entities\SupplierAddress as sup_addr;
class SupplierController extends Controller
{
    protected $data;
    protected $page_title = 'Inventory - Supplier List';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        $supplier = DB::table('supplier_info')
                                                                ->join('supplier_address','supplier_address.supplier_id','=','supplier_info.id')
                                                                ->get();
        $this->data['supplier'] = $supplier;
        return view('inventory::inventory.supplier',$this->setup());
    }
    public function get_supplier(Request $request){
         $check_data = DB::table('supplier_info')->select(['id AS data','title AS value'])
                                                        ->where('title','like','%'.$request->input('query').'%')
                                                        ->orderby('title','ASC')
                                                        ->limit(15)
                                                        ->get();

        $result = array_merge($check_data->all());
        $data['suggestions'] = array();
        foreach($result as $key => $value){
            $data['suggestions'][$key] = array();
            foreach ($value as $keyx => $valuex) {
                $data['suggestions'][$key][$keyx] = "$valuex";
            }
        }
        return $data;
    }

    public function new_suppplier(Request $request){
            $validator = Validator::make($request->all(), [
                    'cmpny_name' => 'required|unique:supplier_info,title',
            ],[
                   'cmpny_name.required' => 'The Company name is required.'
            ]);

                 if($validator->fails()){
                     $data['status'] = 0;
                    $data['errors'] = $validator->messages();
                    return $data;
                }else{
                    $supplier = new Supplier;
                    $supplier->title = $request->input('cmpny_name');
                    $supplier->desc = ($request->input('cmpny_desc')!='')?$request->input('cmpny_desc'):$request->input('cmpny_name');
                     $supplier->save();

                     $sup_addr = new sup_addr;
                    $sup_addr->supplier_id = $supplier->id;
                    $sup_addr->details = $request->input('cmpny_address');
                    $sup_addr->save();
                      $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted Supplier  '.$request->input('cmpny_name');
                         return $data;
                }
    }

}
