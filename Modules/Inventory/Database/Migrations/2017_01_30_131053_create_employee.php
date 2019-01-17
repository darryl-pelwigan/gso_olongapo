<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('olongapo_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name',80);
            $table->string('l_name',80);
            $table->string('m_name',80);
            $table->string('e_name',80);
            $table->string('mobile_number',80);
            $table->integer('department_id');
            $table->integer('position_id');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['f_name', 'l_name', 'm_name', 'e_name', 'mobile_number','position_id'],'olongapo_employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_employee');
    }
}
