<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlongapoAbstrctPubbidItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('olongapo_absctrct_pubbid_item_suppbid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('absctrct_id')->comment('refer to olongapo_absctrct');
            $table->integer('pr_item_id')->comment('refer to olongapo_purchase_request_items');
            $table->integer('pubbid_id')->comment('refer to olongapo_absctrct_pubbid');
            $table->decimal('unit_price',25,2);
            $table->decimal('total_price',25,2);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['absctrct_id', 'pr_item_id', 'pubbid_id', 'unit_price', 'total_price'],'olongapo_absctrct_pubbid_item_suppbid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_absctrct_pubbid_item_suppbid');
    }
}
