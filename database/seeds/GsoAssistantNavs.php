<?php

use Illuminate\Database\Seeder;

class GsoAssistantNavs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->main_navs();
         $this->sub_navs();
    }

    public function main_navs(){
        $admin_group = 6;
         DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(
            [
                'group_id' => $admin_group,
                'title' => 'Department User List',
                'route' => 'gso_assistant.dept_user_list',
                'parent' => '0',
                'arangement' => 2,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
            ],
            [
               'group_id' => $admin_group,
               'title' => 'GSO Template',
               'route' => 'gso.templates',
               'parent' => '0',
               'arangement' => 2,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-file-text-o"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'BID AND AWARDS COMMITTEE',
                'route' => 'gso_assistant.committee_list',
                'parent' => '0',
                'arangement' => 2,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Settings',
                'route' => 'gso_assistant.settings',
                'parent' => '1',
                'arangement' => 2,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
            ]
        ));
    }

    public function sub_navs(){
        $admin_group = 3;
         DB::table(config('app.projcode').'_tmpl_sub_navigation')->insert(array(
            [
                'parent_id' => $this->getMainNav('gso_assistant.settings')->id,
                'title' => 'PROCUREMENT METHOD',
                'route' => 'gso_assistant.proc_methods',
                'arangement' => 1,
                'properties' => '{"i" : {"class":"fa fa-group"},"a" : {"class":"hvr-underline-from-left"}}',
            ],
            [
                'parent_id' => $this->getMainNav('gso_assistant.settings')->id,
                'title' => 'Purchase Request Signee',
                'route' => 'gso_assistant.pr_signee',
                'arangement' => 2,
                'properties' => '{"i" : {"class":"fa fa-group"},"a" : {"class":"hvr-underline-from-left"}}',
            ],
        ));
    }

    private function getMainNav($route) {
        $nav = DB::table(config('app.projcode').'_tmpl_main_navigation')
            ->where('route', '=', $route)
            ->first();
        return $nav;
    }
}
