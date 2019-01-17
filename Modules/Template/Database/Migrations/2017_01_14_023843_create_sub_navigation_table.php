<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create(config('app.projcode').'_tmpl_sub_navigation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->comment('refer to '.config('app.projcode').'_tmpl_main_navigation');
            $table->string('title',50);
            $table->string('route',50);
            $table->integer('arangement')->unsigned()->comment('arangement of the navigation');
            $table->string('properties');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['id', 'parent_id', 'title', 'route',  'arangement'],config('app.projcode').'_tmpl_sub_navigation');
        });

  # Insert
        DB::table(config('app.projcode').'_tmpl_sub_navigation')->insert(array(
            [
                'parent_id' => $this->getMainNav('admin.group_list')->id,
                'title' => 'Group-List',
                'route' => 'admin.group_list',
                'arangement' => 1,
                'properties' => '{"i" : {"class":"fa fa-home"}}',
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
        Schema::dropIfExists(config('app.projcode').'_tmpl_sub_navigation');
    }

    private function getMainNav($route) {
		$nav = DB::table(config('app.projcode').'_tmpl_main_navigation')
			->where('route', '=', $route)
			->first();
		return $nav;
	}
}
