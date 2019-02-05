<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpeCodeSubcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_ppe_code_subcategory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ppe_cat_id');
            $table->string('desc',80);
            $table->integer('code_coa');
            $table->integer('code_family');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['ppe_cat_id', 'desc','code_coa', 'code_family'],'inv_ppe_code_subcategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_ppe_code_subcategory');
    }
}
