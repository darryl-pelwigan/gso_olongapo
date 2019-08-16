<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Inventory\Entities\PPEcode;
use Modules\Inventory\Entities\PPEsubcode;
use Modules\Inventory\Entities\PPEitems;


class PPEcodeController extends Controller
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
        $codes['get_catcodes'] = DB::table('inv_ppe_code_category as ppecat')
                                    ->select('ppecat.id as cat_id','ppecat.desc as cat_desc')
                                    ->groupby('ppecat.id')
                                    ->get();

        $codes['get_subcatcodes'] = DB::table('inv_ppe_code_category as ppecat')
                                    ->join('inv_ppe_code_subcategory as ppesubcat','ppecat.id','=','ppesubcat.ppe_cat_id')
                                    ->select('ppecat.id as cat_id','ppecat.desc as cat_desc','ppesubcat.id as subcat_id','ppesubcat.desc as subcat_desc','ppesubcat.code_coa as code_coa','ppesubcat.code_family as code_family', 'ppesubcat.id as sub_id')
                                    ->orderby('ppesubcat.id','asc')
                                    ->get();

        $codes['get_items'] = DB::table('inv_ppe_code_category as ppecat')
                                    ->join('inv_ppe_code_subcategory as ppesubcat','ppecat.id','=','ppesubcat.ppe_cat_id')
                                    ->join('inv_ppe_code_list as ppeitems','ppecat.id','=','ppeitems.ppe_cat_id')
                                    ->select('ppecat.id as cat_id','ppecat.desc as cat_desc','ppesubcat.id as subcat_id','ppesubcat.desc as subcat_desc','ppesubcat.code_coa as code_coa','ppesubcat.code_family as code_family','ppeitems.desc as ppeitems_desc','ppeitems.code_no as code_no','ppeitems.ppe_subcat_id as ppe_subcat_id', 'ppeitems.id as ppeitems_id')
                                    ->groupby('ppeitems.desc')
                                    ->orderby('ppeitems.code_no','asc')
                                    ->get();
        $this->data['codes']=$codes;

       return view('inventory::inventory.ppe-code',$this->setup());
    }

    public function get_ppecodes(Request $request){
        $check_data = DB::table('inv_ppe_code_category as ppecat')->select(['ppecat.id AS data','ppecat.desc AS value'])
                                                        ->where('ppecat.desc','like','%'.$request->input('query').'%')
                                                        ->orderby('ppecat.desc','ASC')
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

    public function get_ppesubcodes(Request $request){
        $data['cat_desc'] = $request->input('cat_desc');
        $check_data = DB::table('inv_ppe_code_subcategory as ppesubcat')
                                    ->select(['ppesubcat.id AS data','ppesubcat.desc AS value','ppesubcat.ppe_cat_id AS cat_id','ppesubcat.ppe_cat_id AS cat_id'])
                                    ->where('ppesubcat.desc','like','%'.$request->input('query').'%')
                                    ->orderby('ppesubcat.desc','ASC')
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

    public function get_ppeitemcodes(Request $request){
        $data['cat_desc'] = $request->input('cat_desc');
        $check_data = DB::table('inv_ppe_code_list as ppeitemcodes')
                                    ->join('inv_ppe_code_subcategory as ppesubcat','ppesubcat.id','=','ppeitemcodes.ppe_subcat_id')
                                    ->select(['ppeitemcodes.id AS data','ppeitemcodes.desc AS value','ppeitemcodes.ppe_cat_id AS cat_id','ppeitemcodes.ppe_subcat_id AS subcat_id'])
                                    ->where('ppeitemcodes.desc','like','%'.$request->input('query').'%')
                                    ->where('ppeitemcodes.ppe_subcat_id','=',$request->input('subcat_id'))
                                    ->orderby('ppeitemcodes.desc','ASC')
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



    public function add_ppecategory(Request $request){
         $validator = Validator::make($request->all(), [
                    'PPE_code_desc' => 'required|unique:inv_ppe_code_category,desc',
            ],[
                   'PPE_code_desc.required' => 'The PPE CODE CATEGORY Description is required.',
                   'PPE_code_desc.unique' => 'The PPE CODE CATEGORY Description is already added.'
            ]);
            if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();

            }else{
                $PPEcode = new PPEcode;
                $PPEcode->desc = $request['PPE_code_desc'];
                if($PPEcode->save()){
                        $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted PPE CATEGORY '.$request->input('PPE_code_desc');
                    }else{
                        $data['status'] = 2;
                        $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                    }
            }
         return $data;
    }


    public function add_ppesubcategory(Request $request){
            $validator = Validator::make($request->all(), [
                    'PPE_code_category' => 'required|exists:inv_ppe_code_category,desc',
                    'PPE_subcode_desc' => 'required|unique:inv_ppe_code_subcategory,desc',
                    'PPE_subcode_coa' => 'required|unique:inv_ppe_code_subcategory,code_coa',
                    'PPE_subcode_family' => 'required|integer',
            ],[
                   'PPE_code_category.required' => 'The PPE CODE CATEGORY Description is required.',
                   'PPE_code_category.exists' => 'The PPE CODE CATEGORY Description is does not exist.',
                   'PPE_subcode_desc.required' => 'The PPE CODE SUB-CATEGORY Description is required.',
                   'PPE_subcode_desc.unique' => 'The PPE CODE SUB-CATEGORY Description is already added.',
                   'PPE_subcode_coa.unique' => 'The PPE CODE SUB-CATEGORY COA CODE is already added.',
                   'PPE_subcode_coa.required' => 'The PPE CODE SUB-CATEGORY COA CODE is required.',
            ]);

            if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();
            }else{
                $check_data = DB::table('inv_ppe_code_category as ppecat')->select(['ppecat.id AS data'])
                                                        ->where('ppecat.desc',$request->input('PPE_code_category'))
                                                        ->orderby('ppecat.desc','ASC')
                                                        ->get();
                $PPEsubcode = new PPEsubcode;
                $PPEsubcode->ppe_cat_id     = $check_data[0]->data;
                $PPEsubcode->desc           = $request['PPE_subcode_desc'];
                $PPEsubcode->code_coa       = $request['PPE_subcode_coa'];
                $PPEsubcode->code_family    = $request['PPE_subcode_family'];
                if($PPEsubcode->save()){
                        $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted PPE SUB-CATEGORY '.$request->input('PPE_subcode_desc');
                    }else{
                        $data['status'] = 2;
                        $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                    }
            }
         return $data;
    }

    public function add_ppeitems(Request $request){
          $validator = Validator::make($request->all(), [
                    'PPE_subcode_desc2' => 'required|exists:inv_ppe_code_subcategory,id',
                    'PPE_item_desc' => 'required|unique:inv_ppe_code_list,desc',
            ],[
                   'PPE_subcode_desc2.required' => 'The PPE SUB-CODE CATEGORY Description is required.',
                   'PPE_subcode_desc2.exists' => 'The PPE SUB-CODE CATEGORY Description is does not exist.',
                   'PPE_item_desc.required' => 'The PPE CODE ITEM Description is required.',

            ]);

            if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();
            }else{
                $check_data = DB::table('inv_ppe_code_subcategory')->select(['id','ppe_cat_id'])
                                                        ->where('id',$request->input('PPE_subcode_desc2'))
                                                        ->get();

                $check_data2 = DB::table('inv_ppe_code_list')->select(['id'])
                                                        ->where('ppe_subcat_id',$request->input('PPE_subcode_desc2'))
                                                        ->get();
                $PPEsubcode = new PPEitems;
                $PPEsubcode->ppe_cat_id     = $check_data[0]->ppe_cat_id;
                $PPEsubcode->ppe_subcat_id     = $check_data[0]->id;
                $PPEsubcode->desc           = $request['PPE_item_desc'];
                $PPEsubcode->code_no       = count($check_data2)+1;
                if($PPEsubcode->save()){
                        $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted PPE SUB-CATEGORY '.$request->input('PPE_subcode_desc');
                }else{
                        $data['status'] = 2;
                        $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                }
            }
         return $data;
    }


    function delete_ppe_category(Request $request){
        $lists = PPEcode::where('id', $request->id)->delete();
        return 0;
    }

    function delete_ppe_sub_category(Request $request){
        $lists = PPEsubcode::where('id', $request->id)->delete();
        return 0;
    }


    function delete_ppe_items(Request $request){
        $lists = PPEitems::where('id', $request->id)->delete();
        return 0;
        
    }

}
