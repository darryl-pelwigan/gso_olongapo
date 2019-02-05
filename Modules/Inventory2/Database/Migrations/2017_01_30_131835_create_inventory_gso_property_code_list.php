<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryGsoPropertyCodeList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('inv_gsoprop_code_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gsocode_cat_id')->comment('refer to inv_gsoprop_code_category id');
            $table->string('desc',80);
            $table->integer('useful_life');
            $table->integer('code_no');

            $table->softDeletes();
            $table->timestamps();
            $table->index(['gsocode_cat_id', 'desc', 'useful_life', 'code_no'],'inv_gsoprop_code_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_gsoprop_code_list');
    }
}
