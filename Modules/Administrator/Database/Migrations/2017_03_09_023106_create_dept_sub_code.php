<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptSubCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('olongapo_subdepartment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dept_id')->comment('refer to olongapo_department');
            $table->string('subdept_code',80);
            $table->string('dept_desc',80);
            $table->string('year',80);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['subdept_code', 'dept_desc','year','dept_id'],'olongapo_subdepartment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_subdepartment');
    }
}
