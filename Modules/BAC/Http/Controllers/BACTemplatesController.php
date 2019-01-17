<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Modules\Bac\Library\Bac_datatable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;

/*models*/
use Modules\BAC\Entities\BacTemplate;

class BACTemplatesController extends Controller
{
    protected $data;
    protected $page_title = 'Bac Template';



    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        return view('bac::bac-templates.index',$this->setup());
    }

    public function add_template(){
        return view('bac::bac-templates.add-template',$this->setup());
    }

    public function new_template(Request $request){

        if($request->input('tmpl_update')=='true'){
             $BacTemplate = BacTemplate::find($request->input('update_tmpl_id'));
            $validx = [
                    'tmpl_desc' => 'required',
                    'tmpl_tmpl' => 'required',
                    'tmpl_code' => 'required',
            ];
        }else{
             $BacTemplate = new BacTemplate;

               $validx = [
                    'tmpl_desc' => 'required|unique:olongapo_bac_template,template_desc',
                    // 'tmpl_type' => 'required',
                    'tmpl_tmpl' => 'required',
                    'tmpl_code' => 'required|unique:olongapo_bac_template,code',
            ];
        }
        $validator = Validator::make($request->all(),
                $validx
            ,[
                   'tmpl_desc.required' => 'The Template Description is required.',
                   'tmpl_desc.unique' => 'The Template Description is already taken.',
                   // 'tmpl_type.required' => 'The Template BAC Type is required.',
                   'tmpl_tmpl.required' => 'The Template Contents is required.',
                   'tmpl_code.unique' => 'The Template Code is already taken.',
                   'tmpl_code.required' => 'The Template Code is already required.',
            ]);

        if($validator->fails()){
             return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $BacTemplate->template_desc = $request->input('tmpl_desc');
            $BacTemplate->template = json_encode($request->input('tmpl_tmpl'));
            $BacTemplate->code = $request->input('tmpl_code');
            // $BacTemplate->type = $request->input('tmpl_type');
            $BacTemplate->save();
            return Redirect::back();
        }

    }

    public function view_template($id){
         $this->data['tmpl_id'] = $id;
        $this->data['tmpl'] =  DB::table('olongapo_bac_template')
                                    // ->join('olongapo_bac_type','olongapo_bac_type.id','=','olongapo_bac_template.type')
                                    ->select(
                                                // 'olongapo_bac_type.description as type_desc','olongapo_bac_type.id as type_id',
                                                'olongapo_bac_template.template as  tmpl_tmpl','olongapo_bac_template.id as  templ_id','olongapo_bac_template.template_desc as  templ_desc','olongapo_bac_template.code as  templ_code','olongapo_bac_template.updated_at as  templ_date')
                                    ->where('olongapo_bac_template.id','=',$id)
                                    ->first();
        return view('bac::bac-templates.view',$this->setup());
    }


public function _check_save($request){
            if($request->save()){
                $messages = 'Success';
            }else{
                $messages = 'Erors encountered';
            }
            return $messages;
    }


}
