<?php

namespace Modules\Employee\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Position;


class EmployeeController extends Controller
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
        return view('employee::employee.index',$this->setup());
    }

    public function emp_list(){
         $emp_list = DB::table('olongapo_employee_list')
                            ->join('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_employee_list.dept_id')
                            ->join('olongapo_position' , 'olongapo_position.id','=','olongapo_employee_list.position_id','left outer')
                            ->select(['olongapo_employee_list.id', 'olongapo_employee_list.fname', 'olongapo_employee_list.lname', 'olongapo_employee_list.mname', 'olongapo_employee_list.ename', 'olongapo_employee_list.mobile','olongapo_employee_list.sex','olongapo_employee_list.email',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.dept_desc',
                                    'olongapo_position.title'
                                    ]);
        return Datatables::of($emp_list)->make(true);
    }


    public function get_position(Request $request){
        $check_data = DB::table('olongapo_position as position')->select(['position.id AS data','position.title AS value'])
                                                        ->where('position.title','like','%'.$request->input('query').'%')
                                                        ->orderby('position.title','ASC')
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

    public function get_department(Request $request){
        $check_data = DB::table('olongapo_subdepartment as dept')->select(['dept.id AS data','dept.dept_desc AS value'])
                                                        ->where('dept.dept_desc','like','%'.$request->input('query').'%')
                                                        ->orderby('dept.dept_desc','ASC')
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

    public function get_employee(Request $request){
            $validator = Validator::make($request->all(), [
                    'emp_id'                 => 'required|exists:olongapo_employee_list,id',
            ],[
                   'emp_id.required'          => 'The Employee is required.',
                   'emp_id.exists'            => 'The Employee doesnt exist',
            ]);

             if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();

            }else{
                 $data['status'] = 1;
                 $data['errors'] = DB::table('olongapo_employee_list')
                            ->join('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_employee_list.dept_id')
                            ->join('olongapo_position' , 'olongapo_position.id','=','olongapo_employee_list.position_id','left outer')
                            ->select(['olongapo_employee_list.id', 'olongapo_employee_list.bdate','olongapo_employee_list.fname', 'olongapo_employee_list.lname', 'olongapo_employee_list.mname', 'olongapo_employee_list.ename', 'olongapo_employee_list.mobile','olongapo_employee_list.sex','olongapo_employee_list.email',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.dept_desc',
                                    'olongapo_position.title'
                                    ])
                            ->where('olongapo_employee_list.id',$request->input('emp_id'))
                            ->first();
            }

            return $data;
    }

    public function get_employee_name(Request $request){
        $check_data = DB::table('olongapo_employee_list')
                            ->join('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_employee_list.dept_id')
                            ->join('olongapo_position' , 'olongapo_position.id','=','olongapo_employee_list.position_id','left outer')
                            ->select(DB::raw('CONCAT(fname," ",mname , " ",lname) as value, olongapo_employee_list.id as data,olongapo_position.title,olongapo_subdepartment.dept_desc'))
                            ->where('olongapo_employee_list.fname','like','%'.$request->input('query').'%')
                            ->orWhere('olongapo_employee_list.lname','like','%'.$request->input('query').'%')
                            ->orWhere('olongapo_employee_list.mname','like','%'.$request->input('query').'%')
                            ->orWhere('olongapo_employee_list.ename','like','%'.$request->input('query').'%')
                            ->orderby('olongapo_employee_list.lname','ASC')
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

    public function new_employee(Request $request){
        $emp = new Employee;
        $mobile_v = '|unique:olongapo_employee_list,mobile';
        $email_v = '|unique:olongapo_employee_list,email';
                if($request->input('emp_id')!=''){
                    $emp = Employee::find($request->input('emp_id'));
                    $mobile_v = '';
                    $email_v = '';
                }
         $validator = Validator::make($request->all(), [
                    'fname'                 => 'required',
                    'mname'                 => 'required',
                    'lname'                 => 'required',
                    'position'              => 'required',
                    'dept'                  => 'required|exists:olongapo_subdepartment,dept_desc',
                    'bdate'                 => 'required|date',
                    'sex'                   => 'required',
                    'mobile'                 => 'required'.$mobile_v,
                    'emailx'                 => 'required|email'.$email_v,
            ],[
                   'fname.required'         => 'The First Name is required.',
                   'mname.required'         => 'The Middle Name is required.',
                   'lname.required'         => 'The Last Name is required.',
                   'dept.required'          => 'The Department is required.',
                   'dept.exists'            => 'The Department must be defined first',
                   'position.required'      => 'The Position  is required.',
                   'position.exists'        => 'The Position must be defined first',
                   'bdate.required'         => 'The Birthdate is required.',
                   'bdate.date'             => 'The Birthdate must be a valid date',
                    'emailx.email' => 'The email you entered is not valid'
            ]);

            if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();

            }else{

                $position = Position::where('title',$request->input('position'))->first();
                if(!$position){
                    $position = new Position;
                    $position->title = $request->input('position');
                    $position->save();
                }
                $dept = DB::table('olongapo_subdepartment as dept')
                                                        ->where('dept.dept_desc','=',$request->input('dept'))
                                                        ->first();


                $emp->dept_id = $dept->id;
                $emp->position_id = $position->id;
                $emp->fname = $request->input('fname');
                $emp->lname = $request->input('lname');
                $emp->mname = $request->input('mname');
                $emp->ename = $request->input('ename');
                $emp->sex = $request->input('sex');
                $emp->email = $request->input('emailx');
                $emp->mobile = $request->input('mobile');
                $emp->bdate = $request->input('bdate');
                     if($emp->save()){
                        $data['status'] = 1;
                        $data['errors']['message'] = 'Successfully inserted Employee '.$request->input('fname') .' '.$request->input('mname').' '.$request->input('lname');
                     }else{
                         $data['status'] = 2;
                         $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                     }
            }
         return $data;
    }

    public function show_status()
    {
        $this->data['templatex'] = DB::table('olongapo_bac_template')->select('id','template_desc','code')->get();
        return view('employee::status.status',$this->setup());
    }


}
