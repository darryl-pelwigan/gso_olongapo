<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpeCodeList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_ppe_code_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ppe_cat_id');
            $table->integer('ppe_subcat_id');
            $table->string('desc',80);
            $table->integer('code_no');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['ppe_cat_id', 'desc', 'code_no'],'inv_ppe_code_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_ppe_code_list');
    }
}
