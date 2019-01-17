<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/*models*/
use Modules\BAC\Entities\bacCategory;

class CategoryController extends Controller
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
        return view('bac::bac.bac-category',$this->setup());
    }

    public function get_categ(Request $request){
       $bacCategory = bacCategory::find($request->input('categ_id'));
       return $bacCategory;
    }

    public function add_category(Request $request){

         $validator = Validator::make($request->all(),
            [
                    'bac_category_desc' => 'required|unique:olongapo_bac_category,description,'.$request->input('categ_id'),

            ]
            ,[
                   'bac_category_desc.required' => 'The Category Description is required.',
                   'bac_category_desc.unique' => 'The Category is already in the database.',
            ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();

        }else{

            if($request->input('categ_id')==null){
                $bacCategory = new bacCategory;
            }else{
                $bacCategory = bacCategory::find($request->input('categ_id'));
            }
            $bacCategory->description = $request->input('bac_category_desc');
            $bacCategory->save();
            $data['status'] = 1;
            $data['errors'] = 'Succesfully added new Category.';
        }

        return $data;
    }

    public function a_get_categ(Request $request){
          $check_data = DB::table('olongapo_bac_category')
                                    ->select(['id AS data','description AS value'])
                                    ->where('description','like','%'.$request->input('query').'%')
                                    ->orderby('description','ASC')
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


}
