<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryGsoproprtyCodeCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_gsoprop_code_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc',80);
            $table->integer('code_family');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['id', 'desc','code_family'],'inv_gsoprop_code_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_gsoprop_code_category');
    }
}
