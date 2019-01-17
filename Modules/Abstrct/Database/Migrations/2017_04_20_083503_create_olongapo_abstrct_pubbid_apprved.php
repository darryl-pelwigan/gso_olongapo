<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlongapoAbstrctPubbidApprved extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('olongapo_absctrct_pubbid_apprved', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_no')->comment('refer to olongapo_purchase_request_no');
            $table->integer('pr_item_id')->comment('refer to olongapo_purchase_request_items');
            $table->integer('suppbid')->comment('refer to olongapo_absctrct_pubbid_item_suppbid');
            $table->integer('pubbid')->comment('refer to olongapo_absctrct_pubbid');            
            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['date', 'pr_no'],'olongapo_absctrct_pubbid_apprved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_absctrct_pubbid_apprved');
    }
}
