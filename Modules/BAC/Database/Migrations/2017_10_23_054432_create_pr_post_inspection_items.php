<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrPostInspectionItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('olongapo_purchase_request_post_inspection_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_inspect_id')->comment('refer to olongapo_purchase_request_post_inspection');
            $table->integer('item_id')->comment('refer to olongapo_purchase_items');
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
        Schema::dropIfExists('olongapo_purchase_request_post_inspection_items');
    }
}
