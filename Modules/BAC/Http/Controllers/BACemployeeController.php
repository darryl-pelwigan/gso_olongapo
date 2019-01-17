<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BACemployeeController extends Controller
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

   public function get_employee_name(Request $request){
          $check_data = DB::table('olongapo_employee_list')
                                    ->leftjoin('olongapo_department','olongapo_department.id','=','olongapo_employee_list.dept_id')
                                    ->select(['olongapo_employee_list.id AS data',db::raw('CONCAT(olongapo_employee_list.fname," ",olongapo_employee_list.lname) AS value'),'olongapo_department.dept_desc'])
                                    ->where('olongapo_employee_list.fname','like','%'.$request->input('query').'%')
                                    ->orWhere('olongapo_employee_list.lname','like','%'.$request->input('query').'%')
                                    ->orderby('olongapo_employee_list.fname','ASC')
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


    public function a_get_position(Request $request){
        $check_data = DB::table('olongapo_position')
                                    ->select(['olongapo_position.id AS data','olongapo_position.title AS value'])
                                    ->where('olongapo_position.title','like','%'.$request->input('query').'%')
                                    ->orderby('olongapo_position.title','ASC')
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
