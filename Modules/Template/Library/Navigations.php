<?php
namespace Modules\Template\Library;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
/**
*   show all navigations to administrator
*
*/

use Modules\Template\Entities\GroupPermission as Permissions;

use Modules\Template\Entities\UserGroup;

class Navigations
{
    public function get_group($group_id,$select = '*'){
        return DB::table('olongapo_user_groups')->select($select)->where('id',$group_id)->first();
    }

    public function get_all_group($select = '*'){
        return DB::table('olongapo_user_groups')->select($select)->get();
    }

    public function get_all_per_group($group_id,$select = '*'){
        return DB::table('olongapo_tmpl_main_navigation')
                                    ->select($select)
                                    ->where('group_id',$group_id)
                                    ->orderBy('arangement')
                                    ->get();
    }

    public function get_all_navigations(){
        $navs['group'] = DB::table('olongapo_user_groups')->select('id','ugrp_name')
                            ->get();
         for($x= 0;$x<count($navs['group']);$x++) {

            $main[$x] = $this->get_all_per_group($navs['group'][$x]->id,array('id', 'route', 'parent', 'arangement','properties','title','deleted_at'));
                     $subs[$x] = DB::table('olongapo_tmpl_main_navigation')
                        ->join('olongapo_tmpl_sub_navigation', 'olongapo_tmpl_main_navigation.id', '=', 'olongapo_tmpl_sub_navigation.parent_id' )
                        ->select('olongapo_tmpl_sub_navigation.id',
                                 'olongapo_tmpl_sub_navigation.parent_id',
                                 'olongapo_tmpl_sub_navigation.title',
                                 'olongapo_tmpl_sub_navigation.route',
                                 'olongapo_tmpl_sub_navigation.properties')
                        ->where([
                                    [ 'olongapo_tmpl_main_navigation.group_id' ,$navs['group'][$x]->id ]
                                ])
                        ->orderBy('olongapo_tmpl_sub_navigation.arangement')
                        ->get();
        }
        $navs['main'] = $main;
        $navs['subs'] = $subs;
        return $navs;
    }
}
?>