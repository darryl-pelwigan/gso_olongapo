<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlongapoPrchseRequestList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_request_items_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->comment('refer to olongapo_purchase_request_items_category_group');
            $table->string('category');
            $table->integer('unit');
            $table->index(['group_id'],'olongapo_purchase_request_items_category_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_purchase_request_items_category');
    }
}
