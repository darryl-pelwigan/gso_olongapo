<?php

use Illuminate\Database\Seeder;

class AbsctrctNavs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->main_navs();
    }

    public function main_navs(){
        $admin_group = 5;
         DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(
            [
                'group_id' => $admin_group,
                'title' => 'Purchase Request',
                'route' => 'absctrct.pr_list',
                'parent' => '0',
                'arangement' => 2,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-th-list"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Abstract List',
                'route' => 'absctrct.index',
                'parent' => '0',
                'arangement' => 3,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-list-ol"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Supplier List',
                'route' => 'bac.supplier_list',
                'parent' => '0',
                'arangement' => 4,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
            ],
             [
                'group_id' => $admin_group,
                'title' => 'Abstarct Signee',
                'route' => 'absctrct.signee',
                'parent' => '0',
                'arangement' => 5,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-pencil"}}',
            ]
        ));
    }
}
