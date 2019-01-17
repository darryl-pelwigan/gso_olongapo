<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlongapoAbstrct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('olongapo_absctrct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prno_id')->comment('refer to olongapo_purchase_request_no');
            $table->string('control_no',100);
            $table->date('abstrct_date');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['prno_id', 'control_no','abstrct_date'],'olongapo_absctrct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_absctrct');
    }
}
