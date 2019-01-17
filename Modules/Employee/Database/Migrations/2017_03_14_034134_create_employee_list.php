<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
         Schema::create('olongapo_employee_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dept_id')->comment('refer to olongapo_subdepartment');
            $table->integer('position_id')->comment('refer to olongapo_position');
            $table->string('fname',80);
            $table->string('lname',80);
            $table->string('mname',80);
            $table->string('ename',80)->nullable();
            $table->enum('sex',['f','m']);
            $table->date('bdate')->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('email',20)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['dept_id', 'fname','lname','mname','sex'],'olongapo_employee_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_employee_list');
    }
}
