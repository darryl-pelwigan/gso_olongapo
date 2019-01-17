<?php

namespace Modules\Template\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setup\Init;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Modules\Template\Entities\MainNavigation as mainnav;
use Modules\Template\Entities\SubNavigation as childnav;
// load library
use Modules\Template\Library\Navigations as navs;

class NavigationsController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    protected $data;
    protected $page_title = 'Administrator';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }

        /**
     * show navigations list
     */
    public function view_navigations(){
      $navs = new navs;
      $navs = $navs->get_all_navigations();
      return view('administrator::administrator/navigations' , $this->setup())->with('navs',$navs);
    }

    public function get_main_menus_info(Request $request){
      $main_menu_id = $request->input('main_menu');
      $data['main_nav'] = mainnav::withTrashed()->select('id','title','group_id','route','parent','properties','arangement','updated_at','deleted_at')->find($main_menu_id);
      $navs = new navs;
      $data['group'] =  $navs->get_group($data['main_nav']->group_id,array('id','ugrp_name'));
      $data['per_group'] =  $navs->get_all_per_group($data['main_nav']->group_id,array('id','arangement'));
      $data['group_all'] =  $navs->get_all_group(array('id','ugrp_name'));
      return ($data);

    }

    public function check_main_menus_info(Request $request){

        $delete = $request->input('menu_delete');
        $mainnav = mainnav::withTrashed()->find($request->input('menu_id'));
        if($delete==1 && $mainnav->first()){
            if($mainnav->delete()){
            $data['status'] = 1;
            $data['errors']['message'] = 'You have successfully softdeleted '.$request->input('menu_title');
          }else{
            $data['status'] = 2;
            $data['errors']['message'] = 'an error has occured pls try again or refresh your browser ';
          }
        }elseif($delete==0 && $mainnav->first()){
          $mainnav->group_id = $request->input('menu_group');
          $mainnav->title = $request->input('menu_title');
          $mainnav->route = $request->input('menu_route');
          $mainnav->parent = $request->input('menu_parent');
          $mainnav->arangement = $request->input('menu_arrangement');
          $mainnav->properties = ($request->input('prop'));
         if($mainnav->save()){
            $data['status'] = 1;
            $data['errors']['message'] = 'You have successfully updated '.$request->input('menu_title');
          }else{
            $data['status'] = 2;
            $data['errors']['message'] = 'an error has occured pls try again or refresh your browser ';
          }
        }elseif($delete==3 && $mainnav->first()){
          if($mainnav->restore()){
            $data['status'] = 1;
            $data['errors']['message'] = 'You have successfully restored '.$request->input('menu_title');
          }else{
            $data['status'] = 2;
            $data['errors']['message'] = 'an error has occured pls try again or refresh your browser ';
          }

        }else{
          $data['status'] = 2;
          $data['errors']['message'] = 'an error has occured pls try again or refresh your browser ';
        }
        return ($data);

    }

    public function add_main_menus(Request $request){
      $validator = Validator::make($request->all(), [
            'menu_group_id' => 'required|numeric',
            'menu_title' => 'required|regex:/^[a-z0-9 .\-]+$/i',
            'menu_route' => 'required|unique:olongapo_tmpl_main_navigation,route|regex:/^[a-z0-9 .\-]+$/i',
            'menu_arrangement' => 'required|numeric',
        ],
        [
            'menu_group_id.required' => 'The Group is required and cant be empty.',
            'menu_group_id.numeric' => 'The Group must be numeric.',
            'menu_title.required' => 'The Title is required and cant be empty.',
            'menu_title.unique' => 'The Title must be unique.',
            'menu_route.unique' => 'The Route must be unique.',
            'menu_route.required' => 'The Route is required and cant be empty.',
        ]);
        $mainnav = new mainnav;
        if ($validator->fails()) {
          $data['status'] = 0;
          $data['errors'] = $validator->messages();

        }else{
          $mainnav->group_id = $request->input('menu_group_id');
          $mainnav->title = $request->input('menu_title');
          $mainnav->route = $request->input('menu_route');
          $mainnav->parent = $request->input('menu_parent');
          $mainnav->arangement = $request->input('menu_arrangement');
          if($request->input('props')){ $mainnav->properties = $request->input('props'); }
          else{ $mainnav->properties = array('i'=>array('class'=>'fa fa-id-card')); }
          if($mainnav->save()){
            $data['status'] = 1;
            $data['errors']['message'] = 'You have successfully added '.$request->input('menu_title');
          }else{
            $data['status'] = 2;
            $data['errors']['message'] = 'an error has occured pls try again or refresh your browser ';
          }
        }
        return ($data);


    }

    public function add_child_navigations_main(Request $request){

        $validator = Validator::make($request->all(), [
            'menu_parent_id' => 'required|numeric',
            'menu_group_id' => 'required|numeric',
            'menu_title' => 'required|regex:/^[a-z0-9 .\-]+$/i',
            'menu_route' => 'required|unique:olongapo_tmpl_main_navigation,route|regex:/^[a-z0-9 .\-]+$/i',
            'menu_arrangement' => 'required|numeric',
        ],
        [
            'menu_parent_id.required' => 'The Group is required and cant be empty.',
            'menu_group_id.required' => 'The Group is required and cant be empty.',
            'menu_group_id.numeric' => 'The Group must be numeric.',
            'menu_title.required' => 'The Title is required and cant be empty.',
            'menu_title.unique' => 'The Title must be unique.',
            'menu_route.unique' => 'The Route must be unique.',
            'menu_route.required' => 'The Route is required and cant be empty.',
        ]);
        $childnav = new childnav;
        if ($validator->fails()) {
          $data['status'] = 0;
          $data['errors'] = $validator->messages();

        }else{
          $childnav->parent_id = $request->input('menu_parent_id');
          $childnav->title = $request->input('menu_title');
          $childnav->route = $request->input('menu_route');
          $childnav->arangement = $request->input('menu_arrangement');
          if($request->input('props')){ $childnav->properties = $request->input('props'); }
          else{ $childnav->properties = array('i'=>array('class'=>'fa fa-id-card')); }
          if($childnav->save()){
                $mainnav = mainnav::withTrashed()->find($request->input('menu_parent_id'));
                $mainnav->parent = '1';
                $mainnav->save();
                $data['status'] = 1;
                $data['errors']['message'] = 'You have successfully added '.$request->input('menu_title');
          }else{
            $data['status'] = 2;
            $data['errors']['message'] = 'an error has occured pls try again or refresh your browser ';
          }
        }
        return ($data);
    }


}
