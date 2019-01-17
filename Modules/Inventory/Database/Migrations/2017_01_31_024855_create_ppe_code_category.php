<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpeCodeCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('inv_ppe_code_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc',80);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['id', 'desc'],'inv_ppe_code_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_ppe_code_category');
    }
}
