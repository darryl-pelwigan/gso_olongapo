<?php

namespace Modules\GSOassistant\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\GSOassistant\Entities\Procmethod;
use Modules\GSOassistant\Entities\Requestordersignee;

class SettingsController extends Controller
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
        return view('gsoassistant::settings.proc_methods',$this->setup());
    }

    public function proc_methods(){
        return view('gsoassistant::settings.proc_methods',$this->setup());
    }

    public function proc_methods_save(Request $request){
        $validator = Validator::make($request->all(), [
                                    'proc_type'  => 'required|unique:olongapo_procurement_method,proc_title',
                                    'min_value' => 'required|integer|max:'.$request->input('max_value'),
                                    'max_value' => 'required|integer|min:'.$request->input('min_value'),
                                  ]
              );

       if($validator->fails()){
            return back()->withInput()->withErrors($validator->messages());
        }else{
            $Procmethod = new Procmethod;
             $Procmethod->proc_title = $request->input('proc_type');
             $Procmethod->proc_min_value = $request->input('min_value');
             $Procmethod->proc_max_value = $request->input('max_value');
             $Procmethod->save();
             Session::flash('info', ['Procurement Method Successfully save']);
             return back();
        }
    }

    public function proc_methods_update(Request $request)
    {
      $data = Procmethod::find($request->rec_id);
      $data->proc_title = $request->input('proc_type');
      $data->proc_min_value = $request->input('min_value');
      $data->proc_max_value = $request->input('max_value');
      $data->save();
      Session::flash('info', ['Procurement Method Successfully update']);
      return back();

    }

    public function proc_methods_delete(Request $request)
    {
      $data = Procmethod::find($request->id);
      $data->delete();
      return json_encode('Method Deleted');
    }

    public function get_proc_methods(Request $request)
    {
      $data = Procmethod::find($request->id);
      return response()->json($data);
    }

    public function pr_signee(){
          return view('gsoassistant::settings.pr_signee',$this->setup());
    }

    public function pr_signee_save(Request $request){
        $validator = Validator::make($request->all(), [
                                    'emp_name'  => 'required',
                                    'emp_position' => 'required',
                                    'type_of_signee' => 'required',
                                    'year_signee_start' => 'required',
                                    'year_signee_end' => 'required',
                                  ]
              );

       if($validator->fails()){
            return back()->withInput()->withErrors($validator->messages());
        }else{
          $Requestordersignee = Requestordersignee::where('position','=',$request->input('emp_position'))
                                                  ->where('deleted_at','=',null)
                                                  ->first();
          if($Requestordersignee){
             Session::flash('error', ['A City Mayor is still active please delete that entry before adding.']);
             return back();
          }else{
             $signee = new Requestordersignee;
            $signee->full_name = title_case($request->input('emp_name'));
            $signee->position = title_case($request->input('emp_position'));
            $signee->year_signee_start = ($request->input('year_signee_start'));
            $signee->year_signee_end = ($request->input('year_signee_end'));
            $signee->type_of_signee = ($request->input('type_of_signee'));
            $signee->save();
             Session::flash('info', ['Successfully save']);
             return back();
          }

        }
    }

    public function deleteSignee(Request $request){
       $Requestordersignee = Requestordersignee::find( $request->input('data_id'));
       $Requestordersignee->delete();
       return json_encode('Signee Deleted');

    }

    public function get_pr_signee(Request $request)
    {
      $data = Requestordersignee::find($request->id);
      return response()->json($data);
    }

    public function update_pr_signee(Request $request)
    {
      $signee = Requestordersignee::find($request->rec_id);
      $signee->full_name = title_case($request->input('full_name'));
      $signee->position = title_case($request->input('position'));
      $signee->year_signee_start = ($request->input('year_signee_start'));
      $signee->year_signee_end = ($request->input('year_signee_end'));
      $signee->type_of_signee = ($request->input('type_of_signee'));
      $signee->save();
      Session::flash('info', ['Successfully Updated']);
      return back();
    }


}
