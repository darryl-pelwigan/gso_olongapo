<?php

use Illuminate\Database\Seeder;

class BAC_navigation extends Seeder
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
        $admin_group = 4;
         DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(

            [
                'group_id' => $admin_group,
                'title' => 'Abstract List',
                'route' => 'bac.pr_list',
                'parent' => '0',
                'arangement' => 1,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-files-o"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'BAC LIST',
                'route' => 'bac.index',
                'parent' => '0',
                'arangement' => 2,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-navicon"}}',
            ],
            [
               'group_id' => $admin_group,
               'title' => 'BAC Templates',
               'route' => 'bac.templates',
               'parent' => '0',
               'arangement' => 3,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-file-o"}}',
            ],
            [
               'group_id' => $admin_group,
               'title' => 'BIDS AND AWARDS COMMITTEE',
               'route' => 'bac.awards_committee',
               'parent' => '0',
               'arangement' => 3,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-group"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'BAC Category',
                'route' => 'bac.category',
                'parent' => '0',
                'arangement' => 4,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-list-alt"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'BAC Source of Fund',
                'route' => 'bac.sof_i',
                'parent' => '0',
                'arangement' => 4,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-money"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Supplier List',
                'route' => 'bac.supplier_list',
                'parent' => '0',
                'arangement' => 4,
                'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-list"}}',
            ],
            [
               'group_id' => $admin_group,
               'title' => 'Employee List',
               'route' => 'emp.list',
               'parent' => '0',
               'arangement' => 1,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-address-book"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'PPMP Approval',
               'route' => 'bac.ppmp_pr_lists',
               'parent' => '0',
               'arangement' => 9,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-thumbs-up"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'Set PPMP',
               'route' => 'bac.ppmp',
               'parent' => '0',
               'arangement' => 10,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-file-excel-o"}}',
           ],
           [
               'group_id' => $admin_group,
               'title' => 'Post Inspection',
               'route' => 'bac.inspection',
               'parent' => '0',
               'arangement' => 11,
               'properties' => '{"li" : {"class":"animatenavs"},"i" : {"class":"fa fa-file"}}',
           ],
        ));
    }
}
