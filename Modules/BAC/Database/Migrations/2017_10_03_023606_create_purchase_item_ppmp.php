<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemPpmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_item_ppmp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->comment('refer to olongapo_purchase_items');
            $table->integer('category_id')->comment('refer to olongapo_purchase_items_category');
            $table->integer('group_id')->comment('refer to olongapo_purchase_items_category_group');
            $table->integer('subdept_id')->comment('refer to olongapo_subdepartment');
            $table->decimal('unit_price', 11, 2);
            $table->decimal('quantity', 11, 2);
            $table->string('year');
            $table->string('month');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['id', 'item_id', 'category_id', 'group_id', 'subdept_id'], 'olongapo_purchase_item_ppmp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_purchase_item_ppmp');
    }
}
