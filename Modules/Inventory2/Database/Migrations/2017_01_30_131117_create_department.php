<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('olongapo_department', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dept_code');
            $table->string('dept_desc',80);
            $table->string('year',80);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['dept_code', 'dept_desc', 'year'],'olongapo_department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_department');
    }
}
