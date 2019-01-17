<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlongapoAbstrctPubbid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('olongapo_absctrct_pubbid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->comment('refer to supplier_info');
            $table->integer('abstrct_id')->comment('refer to olongapo_absctrct');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['supplier_id', 'abstrct_id'],'olongapo_absctrct_pubbid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_absctrct_pubbid');
    }
}
