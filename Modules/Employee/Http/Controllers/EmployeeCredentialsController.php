<?php

namespace Modules\Employee\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Employee\Entities\Position;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\EmployeeCredentials;


class EmployeeCredentialsController extends Controller
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


    public function set_employee_creadentials(Request $request)
    {
              $validator = Validator::make($request->all(), [
                    'employee_id'                  => 'required|exists:olongapo_employee_list,id|unique:olongapo_user_credentials,employee_id',
                    'uname'                        => 'required|unique:olongapo_user_credentials,ucrd_username',
                    'password'                     => 'required|min:7',
                    'confirmpassword'              => 'required|min:7|same:password',
            ],[
                   'employee_id.required'          => 'The Employee is required.',
                   'employee_id.exists'            => 'The Employee doesnt exist',
                   'employee_id.exists'            => 'The Employee doesnt exist',
            ]);

             if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();

            }else{
                 $data['status'] = 1;
                 $data['errors'] = 'Success';
                 $department_group = DB::table('olongapo_user_groups')->select('id')->where('ugrp_name','=','Department')->first();
                 $EmployeeCredentials = new EmployeeCredentials;
                 $EmployeeCredentials->ucrd_realname = $request->input('fullname');
                 $EmployeeCredentials->ucrd_username = $request->input('uname');
                 $EmployeeCredentials->password = Hash::make($request->input('password'));
                 $EmployeeCredentials->employee_id = $request->input('employee_id');
                 $EmployeeCredentials->group_id = $department_group->id ;
                 $EmployeeCredentials->save();
             }

            return $data;
    }

    public function add_employee_creadentials(Request $request){
        $uname = 'unique:olongapo_user_credentials,ucrd_username';
        $password = 'required';
        $bdate = 'required|date';
        $dept = 'required';
        $position = 'required';

        if($request->input('emp_id') > 0){
            $uname = '';
            $password = "";
            $bdate = "";
            $dept = "";
            $position = "";
        }

        $validator = Validator::make($request->all(), [
                'fname'                     => 'required',
                'mname'                     => 'required',
                'lname'                     => 'required',
                'position'                  => ''.$position.'',
                'dept'                      => ''.$dept.'|exists:olongapo_subdepartment,dept_desc',
                'bdate'                     => ''.$bdate.'',
                'sex'                       => 'required',
                'uname'                     => 'required|'.$uname.'',
                'password'                  => ''.$password.'|min:7',
                'password_confirmation'     => ''.$password.'|min:7|same:password',

        ],[
               'fname.required'             => 'The First Name is required.',
               'mname.required'             => 'The Middle Name is required.',
               'lname.required'             => 'The Last Name is required.',
               'dept.required'              => 'The Department is required.',
               'dept.exists'                => 'The Department must be defined first',
               'position.required'          => 'The Position  is required.',
               'position.exists'            => 'The Position must be defined first',
               'bdate.required'             => 'The Birthdate is required.',
               'bdate.date'                 => 'The Birthdate must be a valid date',
               'bdate.date'                 => 'The Birthdate must be a valid date',
               'password_confirmation.same' => 'Unmatch password. Please try again',

        ]);

        if($request->input('emp_id') > 0){
            $emp = Employee::find($request->input('emp_id'));
            $EmployeeCredentials = EmployeeCredentials::where('employee_id', $request->input('emp_id'))->first();
        }else{
            $emp = new Employee;
            $EmployeeCredentials = new EmployeeCredentials;
        }

            if($validator->fails()){
                $data['status'] = 0;
                $data['errors'] = $validator->messages();

            }else{

                $position = Position::where('title',$request->input('position'))->first();
                if(!$position && $request->input('position') != ''){
                    $position = new Position;
                    $position->title = $request->input('position');
                    $position->save();
                }
                $dept = DB::table('olongapo_subdepartment as dept')
                            ->where('dept.dept_desc','=',$request->input('dept'))
                            ->first();

                $emp->dept_id = $dept->id;
                $emp->position_id = (count($position) > 0 ? $position->id : 0 );
                $emp->fname = $request->input('fname');
                $emp->lname = $request->input('lname');
                $emp->mname = $request->input('mname');
                $emp->ename = $request->input('ename');
                $emp->sex = $request->input('sex');
                $emp->bdate = $request->input('bdate');
                $emp->email = $request->input('email');
                $emp->mobile = $request->input('mobile');           

                if($emp->save()){

                    $department_group = DB::table('olongapo_user_groups')->select('id')->where('ugrp_name','=','Department')->first();
                    $fullname = $request->input('fname').' '.$request->input('mname').' '.$request->input('lname');

                   
                    $EmployeeCredentials->ucrd_realname = $fullname;
                    $EmployeeCredentials->ucrd_username = $request->input('uname');
                    $EmployeeCredentials->password = Hash::make($request->input('password'));
                    $EmployeeCredentials->employee_id = $emp->id;
                    $EmployeeCredentials->group_id = $department_group->id ;
                    $EmployeeCredentials->save();

                    $data['status'] = 1;
                    $data['errors']['message'] = 'Successfully inserted Employee '.$fullname;
                }else{
                    $data['status'] = 2;
                    $data['errors']['message'] = 'An error has occured pls try again or refresh your browser ';
                }
            }

      
         return $data;
    }

    public function get_employee_creadentials(Request $request){
        $emp_id = $request->input('emp_id');

        $data['employee'] = DB::table('olongapo_employee_list')
                            ->join('olongapo_user_credentials' , 'olongapo_user_credentials.employee_id','=','olongapo_employee_list.id')
                            ->join('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_employee_list.dept_id')
                            ->join('olongapo_position' , 'olongapo_position.id','=','olongapo_employee_list.position_id','left outer')
                            ->select([
                                    'olongapo_employee_list.id', 
                                    'olongapo_employee_list.fname',
                                    'olongapo_employee_list.lname',
                                    'olongapo_employee_list.mname',
                                    'olongapo_employee_list.ename',
                                    'olongapo_employee_list.mobile',
                                    'olongapo_employee_list.sex',
                                    'olongapo_employee_list.email',
                                    'olongapo_employee_list.dept_id',
                                    'olongapo_employee_list.position_id',
                                    'olongapo_employee_list.bdate',
                                    'olongapo_employee_list.email',
                                    'olongapo_employee_list.mobile',
                                    'olongapo_user_credentials.ucrd_username',
                                    'olongapo_subdepartment.dept_desc',
                                    'olongapo_position.title',
                                ])
                             ->where('olongapo_employee_list.id',$emp_id)
                             ->first();
    
        return $data;
    }
    public function delete_employee_record(Request $request){
        $employee_id = $request->input('emp_id');

        for ($i=0; $i < count($employee_id); $i++) { 
           $empcred = EmployeeCredentials::where('employee_id', $employee_id[$i])->delete();
           $emp = Employee::find($employee_id[$i]);
           $emp->delete();
        }
        $data['status'] = 0;
        return $data;
    }


}
