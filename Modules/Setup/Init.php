<?php
namespace Modules\Setup;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
/**
*
*/
class Init
{
    protected $data;

    function __construct()
    {

    }

    public function setup($vars){

        $data['tpl'] = array(
                                'top_bar' => array(
                                                    'bar_search' => false,
                                                    'navbar_custom_menu' => !Auth::check()?false:true
                                                ),
                                'left_sbar' => array(

                                                ),
                                'right_sbar' => array(

                                                ),

                            );

        if(Session::get('olongapo_permission')){
            $data['menu'] = 'administrators';
            $data['page_title'] = 'OLONGAPO-'.Session::get('olongapo_permission')->ugrp_name;
            $data['realname'] = Session::get('olongapo_user')->ucrd_realname;
            $data['navs'] = $this->get_all_navigations();
        }else{
            $data['menu'] = '';
            $data['page_title'] = 'OLONGAPO-'.'('.$vars['page'].')';
            $data['realname'] = '';
            $data['navs'] = '';
        }

        return $data;

    }

    public function get_all_navigations(){
        $navs['main'] = DB::table('olongapo_tmpl_main_navigation')
                                ->select('id', 'route', 'parent', 'arangement','properties','title')
                                ->where('group_id',Session::get('olongapo_permission')->id)
                                ->where('deleted_at',NULL)
                                ->orderBy('arangement')
                                ->get();
        $navs['subs'] = DB::table('olongapo_tmpl_main_navigation')
                    ->join('olongapo_tmpl_sub_navigation', 'olongapo_tmpl_main_navigation.id', '=', 'olongapo_tmpl_sub_navigation.parent_id' )
                    ->select('olongapo_tmpl_sub_navigation.id',
                             'olongapo_tmpl_sub_navigation.parent_id',
                             'olongapo_tmpl_sub_navigation.title',
                             'olongapo_tmpl_sub_navigation.route',
                             'olongapo_tmpl_sub_navigation.properties')
                    ->where('olongapo_tmpl_main_navigation.group_id', Session::get('olongapo_permission')->id)
                    ->orderBy('olongapo_tmpl_sub_navigation.arangement')
                    ->get();
        return $navs;
    }





}
?>