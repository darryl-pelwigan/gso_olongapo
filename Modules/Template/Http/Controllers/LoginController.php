<?php

namespace Modules\Template\Http\Controllers;


use Modules\Setup\Init;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\Template\Entities\UserCredentials;
use Modules\Template\Entities\GroupPermission as Permissions;

use Modules\Employee\Entities\Employee;
class LoginController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    protected $data;
    protected $page_title = 'Login';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){

        return view('template::top-nav-pages.login',$this->setup());
    }

    public function test(){

        return view('template::test',$this->setup());
    }


    public function check(Request $request){
        $field = filter_var($request->input('olongapo_userelogin'), FILTER_VALIDATE_EMAIL) ? 'ucrd_email' : 'ucrd_username';

        $validator = Validator::make($request->all(), [
            'olongapo_userelogin' => 'required|min:4|max:255',
            'olongapo_password' => 'required|min:4|max:255',
        ]);

        $userdata = [
            $field => $request['olongapo_userelogin'],
            'password' => $request['olongapo_password']
        ];

        if($validator->fails()){
                    $validator->getMessageBag()->add('validation', 'The username or password is incorrect.');
                     return redirect('/login')->withErrors($validator);
            }elseif(Auth::attempt($userdata,$request['remember_me'])){
                $get_user = UserCredentials::select(
                                        'id',
                                        'ucrd_realname',
                                        'ucrd_email',
                                        'group_id',
                                        'employee_id'
                                    )
                                    ->where($field , $request['olongapo_userelogin'])
                                    ->first();
                        $Employee = Employee::select(
                                        'dept_id',
                                        'position_id'
                                    )
                                    ->find( $get_user->employee_id)
                                   ;
                        Session::put(config('app.projcode').'_emp_depts', $Employee);
                        Session::put(config('app.projcode').'_user', $get_user);
                        Session::put( config('app.projcode').'_permission', self::getUserGroupPermissions() );
                        Session::save();
                        $this->log_login_logout($request);
                        return $this->redirect_by_group();
            }else{

                    $validator->getMessageBag()->add('validation', 'The username or password is incorrect.');
                    return redirect('/login')->withErrors($validator);
            }

         return view('template::top-nav-pages.login',$this->setup());
    }

    public function getUserGroupPermissions(){
        if (empty(Session::get(config('app.projcode').'_user'))) {
            return redirect('/logout');
        }
        $group_permission = Permissions::where('id' , Session::get(config('app.projcode').'_user')->group_id )->first();
        return $group_permission;
    }

     /**
     * redirect by group home page
     */
    public function redirect_by_group(){

         return redirect()->route(Session::get(config('app.projcode').'_permission')->ugrp_homepage);
    }

    public function log_login_logout($request=null){
        if (session::has(config('app.projcode').'_logging')) {
            $logging = DB::table(config('app.projcode').'_user_logging')
             ->where('id', session::get('olongapo_logging')['logging_id'])
            ->update([
                            'logout_time' => Carbon::now(),
                        ]);
        }else{
              if (session::has(config('app.projcode').'_logging')){
                       $logging = DB::table(config('app.projcode').'_user_logging')
                                                ->insertGetId([
                                                                'credential_id' =>session::get('olongapo_user')->id,
                                                                'login_time' => Carbon::now(),
                                                                'login_ip' => $request->ip()
                                                            ]);
                        $logging_data = [ 'logging_id' => $logging , 'logging_ip' => $request->ip() ];
                        Session::put(config('app.projcode').'_logging', $logging_data);
              }
        }

    }



    public function logout() {
        $this->log_login_logout();
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

}
