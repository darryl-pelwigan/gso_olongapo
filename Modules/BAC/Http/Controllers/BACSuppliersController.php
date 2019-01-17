<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\Inventory\Entities\Supplier;
use Modules\Inventory\Entities\SupplierAddress as sup_addr;

class BACSuppliersController extends Controller
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


    public function supplier_list()
    {
        return view('bac::suppliers.index',$this->setup());
    }

    public function supplier(Request $request){
        $supp = db::table('supplier_info')
                        ->leftJoin('supplier_address','supplier_address.supplier_id','=','supplier_info.id')
                        ->where('supplier_info.id','=',$request->input('supp_id'))
                        ->first();
        return json_encode($supp);
    }

    public function update_supplier(Request $request){

        $validator = Validator::make($request->all(), [
                'cmpny_name' => 'required',
        ],[
               'cmpny_name.required' => 'The Company name is required.'
        ]);

             if($validator->fails()){
                 $data['status'] = 0;
                $data['errors'] = $validator->messages();
             }else{
                $supp = Supplier::find($request['supp_id']);
                $supp->title = $request['cmpny_name'];
                $supp->desc = $request['cmpny_desc'];
                $supp->save();

                $sup_addr = sup_addr::where('supplier_id','=',$request['supp_id'])->first();
                if($sup_addr==null){
                    $sup_addr = new sup_addr;
                    $sup_addr->supplier_id =  $request['supp_id'];
                }
                $sup_addr->details =  $request['cmpny_address'];
                $sup_addr->save();

                $data['status'] = 1;
                $data['errors'] = 'supplier updated';
            }
            return $data;

    }

    public function delete_supplier(Request $request){
        $supplier_id = $request->input('supplier_id');
        for ($i=0; $i < count($supplier_id); $i++) { 
           $supplier = Supplier::find($supplier_id[$i]);
           $supplier->delete();
        }
        $data['status'] = 0;
        return $data;
    }



}
