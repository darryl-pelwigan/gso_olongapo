<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('app.projcode').'_tmpl_main_navigation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->comment('refer to '.config('app.projcode').'_user_groups');
            $table->string('title',50);
            $table->string('route',50);
            $table->enum('parent',['0','1'])->comment('0 no subs , 1 parent with subs');
            $table->integer('arangement')->unsigned()->comment('arangement of the navigation');
            $table->string('properties');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['id', 'title', 'route', 'parent', 'arangement'],config('app.projcode').'_tmpl_main_navigation');
        });

         # Insert
        $admin_group = 1;
        DB::table(config('app.projcode').'_tmpl_main_navigation')->insert(array(
            [
                'group_id' => $admin_group,
                'title' => 'Navigations',
                'route' => 'admin.navigations',
                'parent' => '0',
                'arangement' => 1,
                'properties' => '{"i" : {"class":"fa fa-navicon"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Groups',
                'route' => 'admin.group_list',
                'parent' => '0',
                'arangement' => 2,
                'properties' => '{"i" : {"class":"fa fa-group"}}',
            ],
            [
                'group_id' => $admin_group,
                'title' => 'Users',
                'route' => 'admin.user_list',
                'parent' => '0',
                'arangement' => 3,
                'properties' => '{"i" : {"class":"fa fa-group"}}',
            ]
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('app.projcode').'_tmpl_main_navigation');
    }
}
