<?php

namespace Modules\Administrator\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Administrator\Entities\DeptCodes;
use Modules\Administrator\Entities\DEPTsubcode;
use Illuminate\Support\Facades\DB;

class DepartmentCodeController extends Controller
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

    public function dept_codes()
    {
        $this->data['dept'] = DB::table('olongapo_department')
                        ->leftJoin('olongapo_subdepartment','olongapo_subdepartment.dept_id','=','olongapo_department.id')
                        ->orderby('olongapo_department.dept_code','asc')
                        ->get();


        return view('administrator::department.dept-codes',$this->setup());
    }

    public function add_deptcode(Request $request){
        // regex:/^[1-9]{1,3}[\.]{0,1}[\d]{0,9}$/
       $validator = Validator::make($request->all(), [
        'dept_code' => 'required|integer|unique:olongapo_department,dept_code',
        'dept_desc' => 'required|unique:olongapo_department,dept_desc'
      ],
      [
        'dept_code.required' => 'Department Code is required',
        'dept_code.integer' => 'Department Code must be integer starting from 1',
        'dept_code.unique' => 'Department Code must be unique',
      ]);
        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();

        }else{
            $dept_code = new DeptCodes;

            $dept_code->dept_code = $request['dept_code'];
            $dept_code->dept_desc = $request['dept_desc'];
            $dept_code->year = date('Y');

            if($dept_code->save()){
                $dept_subcode = new DEPTsubcode;
                $dept_subcode->dept_id  = $dept_code->id;
                $dept_subcode->subdept_code = 0;
                $dept_subcode->dept_desc = $request['dept_desc'];
                $dept_subcode->year = date('Y');
                if($dept_subcode->save()){
                    $data['status'] = 1;
                    $data['errors'] = 'Successfully added '.$request['dept_code'].' '.$request['dept_desc'];
                }else{
                    $data['status'] = 0;
                    $data['errors'] = 'Error encountered please refresh your browser and try again.';
                }
            }else{
                $data['status'] = 0;
                $data['errors'] = 'Error encountered please refresh your browser and try again.';
            }



        }

         return $data;
    }

    public function add_subdeptcode(Request $request){
        $dept_id = DB::table('olongapo_department')
                                ->select('id')
                                ->where('dept_desc','=',$request['dept_code'])
                                ->first();

        $validator = Validator::make($request->all(), [
        'dept_code' => 'required|exists:olongapo_department,dept_desc',
        'subdept_code' => 'required|integer|unique:olongapo_subdepartment,subdept_code,NULL,NULL,dept_id,'.$dept_id->id,
        'subdept_desc' => 'required|unique:olongapo_subdepartment,dept_desc,NULL,NULL,dept_id,'.$dept_id->id
      ],
      [
        'dept_code.required' => 'Department Code is required',
        'subdept_code.integer' => 'Department Code must be integer starting from 1',
        'subdept_code.unique' => 'Department Code must be unique',
        'subdept_desc.required' => 'Department Description is required',
        'subdept_desc.unique' => 'Department Description must be unique',

      ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{

            $dept_code = new DEPTsubcode;
            $dept_code->dept_id  = $dept_id->id;
            $dept_code->subdept_code = $request['subdept_code'];
            $dept_code->dept_desc = $request['subdept_desc'];
            $dept_code->year = date('Y');

            if($dept_code->save()){
                $data['status'] = 1;
                $data['errors'] = 'Successfully added '.$request['subdept_code'].' '.$request['subdept_desc'];
            }else{
                $data['status'] = 0;
                $data['errors'] = 'Error encountered please refresh your browser and try again.';
            }
        }

         return $data;
    }

    public function get_deptcodes(Request $request){
        $data['cat_desc'] = $request->input('cat_desc');
        $check_data = DB::table('olongapo_department as dept_codes')
                                    ->select(['dept_codes.id AS data','dept_codes.dept_desc AS value','dept_codes.dept_code AS dept_code'])
                                    ->where('dept_codes.dept_desc','like','%'.$request->input('query').'%')
                                    ->orderby('dept_codes.dept_desc','ASC')
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

    public function get_subdeptcodes(Request $request){
        $data['cat_desc'] = $request->input('cat_desc');
        $check_data = DB::table('olongapo_subdepartment as subdept_codes')
                                    ->join('olongapo_department as dept_codes','dept_codes.id','=','subdept_codes.dept_id')
                                    ->select(['subdept_codes.id AS data','subdept_codes.dept_desc AS value','subdept_codes.subdept_code','dept_codes.dept_code'])
                                    ->where('subdept_codes.dept_desc','like','%'.$request->input('query').'%')
                                    ->orderby('subdept_codes.dept_desc','ASC')
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
