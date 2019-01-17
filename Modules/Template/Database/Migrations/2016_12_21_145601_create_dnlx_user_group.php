<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnlxUserGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

                Schema::create(config('app.projcode').'_user_groups', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('ugrp_name',50)->unique();
                    $table->string('ugrp_description');
                    $table->string('ugrp_homepage');
                    $table->timestamps();
                    $table->index(['id', 'ugrp_homepage'],config('app.projcode').'_user_groups_key');
                });

                # Insert
                DB::table(config('app.projcode').'_user_groups')->insert(array(
                    [
                        'ugrp_name' => 'Administrators',
                        'ugrp_homepage' => 'admin.index',
                        'ugrp_description' => 'Privileged users'
                    ],
                    [
                        'ugrp_name' => 'Inventory',
                        'ugrp_homepage' => 'inventory.index',
                        'ugrp_description' => 'None Priveledge users '
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
        Schema::dropIfExists(config('app.projcode').'_user_groups');
    }
}
