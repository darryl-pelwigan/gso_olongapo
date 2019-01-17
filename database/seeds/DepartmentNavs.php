<?php

use Illuminate\Database\Seeder;

class DepartmentNavs extends Seeder
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
        $admin_group = 7;
         DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(

            [
                'group_id' => $admin_group,
                'title' => 'Purchase Request',
                'route' => 'dept.purchase_request',
                'parent' => '0',
                'arangement' => 1,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
            ],

        ));
    }
}
