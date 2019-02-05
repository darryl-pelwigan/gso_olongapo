<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpeMonthlyReport extends Migration
{
        private $table = 'olongapo_ppe_mnthly_report';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_log');
            $table->string('inv_control_no');
            $table->string('type')->comment('Supply or Equipement');
            $table->integer('department');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
