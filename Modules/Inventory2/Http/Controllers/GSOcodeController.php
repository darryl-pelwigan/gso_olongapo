<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Inventory\Entities\GSOCategory as gsocodecat;
use Modules\Inventory\Entities\GSOItems as gsocodeitems;

class GSOcodeController extends Controller
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
        $codes['get_catcodes'] = DB::table('inv_gsoprop_code_category as gsocat')
                                    ->select('gsocat.id as cat_id','gsocat.desc as cat_desc','gsocat.code_family')
                                    ->get();
        $codes['get_codes'] = DB::table('inv_gsoprop_code_category as gsocat')
                                    ->join('inv_gsoprop_code_list as gsocodes' ,'gsocat.id','=','gsocodes.gsocode_cat_id')
                                    ->select('gsocat.id as cat_id','gsocat.code_family','gsocodes.desc','gsocodes.useful_life','gsocodes.code_no')
                                    ->orderby('gsocodes.code_no')
                                    ->groupby('gsocat.id','gsocodes.desc')
                                    ->get();
       $this->data['codes']=$codes;
       return view('inventory::inventory.gso-code',$this->setup());
    }

    public function add_category(Request $request){
         $validator = Validator::make($request->all(), [
                    'gso_code_desc' => 'required',
            ],[
                   'gso_code_desc.required' => 'The GSO CODE CATEGORY Description is required.'
            ]);

        if($validator->fails()){
             $data['status'] = 0;
            $data['errors'] = $validator->messages();
            return $data;
        }else{
            $get_codefamily = DB::table('inv_gsoprop_code_category')
                                        ->select(DB::raw('MAX(code_family) as code_family'))
                                        ->get();
            $get_codefamily = $get_codefamily[0]->code_family + 1;
            $gsocodecat = new gsocodecat;
                $gsocodecat->desc = $request->input('gso_code_desc');
                $gsocodecat->code_family = $get_codefamily;
                    if($gsocodecat->save()){
                        $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted GSO CATEGORY '.$request->input('gso_code_desc');
                    }else{
                        $data['status'] = 2;
                        $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                    }

                                        return $data;
            // $gsocodecat = new gsocodecat;

        }
    }


    public function add_gsocodeitems(Request $request){
        $validator = Validator::make($request->all(), [
                    'gso_code_category' => 'required',
                    'gso_codeitems_desc' => 'required',
                    'gso_items_usefull_life' => 'required',
            ],[
                   'gso_code_category.required' => 'The GSO CODE CATEGORY is required.',
                   'gso_codeitems_desc.required' => 'The GSO CODE ITEMS Description is required.',
                   'gso_items_usefull_life.required' => 'The GSO CODE ITEMS Usefull Life is required.'
            ]);

        if($validator->fails()){
             $data['status'] = 0;
            $data['errors'] = $validator->messages();
            return $data;
        }else{
            $get_codefamily = DB::table('inv_gsoprop_code_list')
                                        ->select(DB::raw('MAX(code_no) as code_no'))
                                        ->where('gsocode_cat_id','=',$request->input('gso_code_category'))
                                        ->get();
            $get_codefamily = $get_codefamily[0]->code_no + 1;

            $gsocodeitems = new gsocodeitems;
                $gsocodeitems->desc = $request->input('gso_codeitems_desc');
                $gsocodeitems->useful_life = $request->input('gso_items_usefull_life');
                $gsocodeitems->code_no = $get_codefamily;
                $gsocodeitems->gsocode_cat_id = $request->input('gso_code_category');
                    if($gsocodeitems->save()){
                        $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted GSO ITEMS '.$request->input('gso_codeitems_desc');
                    }else{
                        $data['status'] = 2;
                        $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                    }
            return $data;
        }
    }

}
