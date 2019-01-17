<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\BAC\Entities\SourceOfFund;

class SourceOfFundController extends Controller
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
        return view('bac::bac.sof',$this->setup());
    }


    public function get_sof(Request $request){
        $SourceOfFund = SourceOfFund::find($request->input('sof_id'));
       return $SourceOfFund;
    }

    public function add_sof(Request $request){

         $validator = Validator::make($request->all(),
            [
                    'bac_sof_desc' => 'required|unique:olongapo_bac_source_fund,description,'.$request->input('categ_id'),

            ]
            ,[
                   'bac_sof_desc.required' => 'The Source of Fund Description is required.',
                   'bac_sof_desc.unique' => 'The Source of Fund is already in the database.',
            ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();

        }else{

            if($request->input('sof_id')==null){
                $SourceOfFund = new SourceOfFund;
            }else{
                $SourceOfFund = SourceOfFund::find($request->input('sof_id'));
            }
            $SourceOfFund->description = $request->input('bac_sof_desc');
            $SourceOfFund->save();
            $data['status'] = 1;
            $data['errors'] = 'Succesfully added new Source of Fund.';
        }

        return $data;
    }
}
