<?php

namespace Modules\Administrator\Http\Controllers;

use Modules\Setup\Init;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
use Modules\Template\Entities\UserGroup;
use Modules\Template\Entities\UserCredentials;

use Modules\Template\Library\Navigations as navs;


class AdministratorController extends Controller
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
        // dd("asdas");

        // return view('administrator::administrator.index',$this->setup());
      $navs = new navs;
      $navs = $navs->get_all_navigations();
      return view('administrator::administrator/navigations' , $this->setup())->with('navs',$navs);
    }

    public function user_list(){
        $group = UserGroup::all();
        $result = UserCredentials::all();
        return view('administrator::administrator/user-list' , $this->setup(), compact('result','group'));
    }

    public function user_store(Request $request){
      $validator = Validator::make($request->all(), [
        'ucrd_realname' => 'required',
        'ucrd_username' => 'required|unique:olongapo_user_credentials,ucrd_username|min:3|max:255',
        'password' => 'required|min:3|max:255',
        'retype_password' => 'same:password',
        'ucrd_email' => 'sometimes|email|unique:olongapo_user_credentials,ucrd_email',
        'group_id' => 'required'
      ]);


      if ($validator->fails()) {
          return redirect()->route('admin.user_list')
              ->withErrors($validator)
              ->withInput();
      }else{
        UserCredentials::create([
          'ucrd_realname' => $request->input('ucrd_realname'),
          'ucrd_username' => $request['ucrd_username'],
          'password' => Hash::make($request['password']),
          'ucrd_email' => $request['ucrd_email'],
          'group_id' => $request->input('group_id')
        ]);

        return redirect()->route('admin.user_list');
      }



    }

    public function user_update(Request $request, $id){
        $user = UserCredentials::findOrFail($id);

        $validator = Validator::make($request->all(), [
          'ucrd_username' => 'required|min:3|max:255',
          'password' => 'required|min:3|max:255',
          'retype_npassword' => 'same:password',
          'ucrd_email' => 'sometimes|email',
          'group_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user_list')
                ->withErrors($validator)
                ->withInput();
        }
        $user->ucrd_username = $request['ucrd_username'];
        $user->password = Hash::make($request['password']);
        $user->ucrd_email = $request['ucrd_email'];
        $user->group_id = $request['group_id'];
        $user->save();
        return redirect()->route('admin.user_list');
    }

    public function user_delete($id){
        UserCredentials::findOrFail($id)->delete();
        return redirect()->route('admin.user_list');
    }

    public function user_verify($id){
        $user = UserCredentials::findOrFail($id);
        $user->is_approved = 1;
        $user->save();
        return redirect()->route('admin.user_list');
    }

    public function group_list(){

        $result = UserGroup::all();
        return view('administrator::administrator/group-list' , $this->setup(), compact('result'));
    }


    public function group_store(Request $request){

        $validator = Validator::make($request->all(), [
          'ugrp_name' => 'required|unique:olongapo_user_groups|min:3|max:255',
          'ugrp_description' => 'required|min:3|max:255',
          'ugrp_homepage' => 'required|min:3|max:255|unique:olongapo_user_groups,ugrp_homepage'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.group_list')
                ->withErrors($validator)
                ->withInput();

        }elseif(!Route::has($request['ugrp_homepage'])){
         $validator->getMessageBag()->add('error', 'home page must be a valid route name.');
            return redirect()->route('admin.group_list')
                ->withErrors($validator)
                ->withInput();
        }else{
          UserGroup::create([
          'ugrp_name' => $request['ugrp_name'],
          'ugrp_homepage' => $request['ugrp_homepage'],
          'ugrp_description' => $request['ugrp_description']
          ]);

          return redirect()->route('admin.group_list');
      }
    }


    public function group_update(Request $request, $id){
       $validator = Validator::make($request->all(), [
          'ugrp_name' => 'required|min:3|max:255',
          'ugrp_description' => 'required|min:3|max:255',
          'ugrp_homepage' => 'required|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.group_list')
                ->withErrors($validator)
                ->withInput();
        }elseif(!Route::has($request['ugrp_homepage'])){
         $validator->getMessageBag()->add('error', 'home page must be a valid route name.');
            return redirect()->route('admin.group_list')
                ->withErrors($validator)
                ->withInput();
        }else{
              UserGroup::findOrFail($id)->update([
              'ugrp_name' => $request['ugrp_name'],
               'ugrp_homepage' => $request['ugrp_homepage'],
              'ugrp_description' => $request['ugrp_description']
              ]);

            return redirect()->route('admin.group_list');
        }


    }

    public function group_delete($id){
        UserGroup::findOrFail($id)->delete();
        return redirect()->route('admin.group_list');
    }


    public function test(){
      $category = array(
                                    1=>'Office Supplies',
                                    2=>'Medical, Dental, and Laboratory Supplies',
                                    3=>'Military, Police and Traffic Supplies',
                                    4=>'School Supplies',
                                    5=>'Hospital Supplies',
                                    6=>'Agricultural and Marine Supplies',
                                    7=>'Maintenance Supplies',
                                    8=>'Other Inventories'
                                );
        $code_list_sups = array(
                                       'office_sup'=>array(
                                                        'cat_id' =>$category[1],
                                                        'code_list' => array(
                                                                            1=>'Ballpen',
                                                                            2=>'Pencil',
                                                                            3=>'Paper',
                                                                )
                                        ),
                                        'medlab_sup'=>array(
                                                        'cat_id' =>$category[2],
                                                        'code_list' => array(
                                                                            1=>'Mouth Mirrors',
                                                                            2=>'Mirror Handles',
                                                                            3=>'Spoon Excavator',
                                                                )

                                        ),  
                                       
                                    );
        $count = 0;

        foreach ($code_list_sups as $key => $code_list_sup) {
          // $test[$count] = $code_list_sup['cat_id'];
          $count2 = 0;
          foreach ($code_list_sup['code_list'] as $keyx => $value) {
           $test[$count][$count2] =  $value;
            $count2++;
          }
          $count++;
        }
        return $test;
    }


}
