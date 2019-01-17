<?php

use Illuminate\Database\Seeder;

class purchaseor_navigations extends Seeder
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
        $admin_group = 3;
         DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(
            [
               'group_id' => $admin_group,
               'title' => 'Supplier',
               'route' => 'bac.supplier_list',
               'parent' => '0',
               'arangement' => 3,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
           ],
            [
                'group_id' => $admin_group,
                'title' => 'Purchase Order',
                'route' => 'po.index',
                'parent' => '0',
                'arangement' => 1,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'BAC List',
                'route' => 'pr.no-pono',
                'parent' => '0',
                'arangement' => 2,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-list"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Purchase Request',
                'route' => 'pr.index',
                'parent' => '0',
                'arangement' => 3,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-th-list"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Department Code',
                'route' => 'dept.code',
                'parent' => '0',
                'arangement' => 4,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-building-o"}}',
            ]
        ));
    }

     
}
