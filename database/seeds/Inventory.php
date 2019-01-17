<?php

use Illuminate\Database\Seeder;

class Inventory extends Seeder
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
    	$admin_group = 2;
    	DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(
            [
                'group_id' => $admin_group,
                'title' => '  PPE MONTHLY REPORT',
                'route' => 'inventory.ppe-monthly-report',
                'parent' => '0',
                'arangement' => 1,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
            ],
           [
               'group_id' => $admin_group,
               'title' => 'Invetnory PPE',
               'route' => 'inventory.ppe',
               'parent' => '0',
               'arangement' => 1,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'Employee List',
               'route' => 'emp.list',
               'parent' => '0',
               'arangement' => 1,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'GSO CODES',
               'route' => 'inventory.gso_code',
               'parent' => '0',
               'arangement' => 3,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'PPE CODES',
               'route' => 'inventory.ppe_code',
               'parent' => '0',
               'arangement' => 4,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'Supplier',
               'route' => 'bac.supplier_list',
               'parent' => '0',
               'arangement' => 3,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
           ]
        ));
    }

    public function sub_navs(){

    }
}
