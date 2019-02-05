<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_info_id')->comment('refer to inventory_info');
            $table->text('item_desc');
            $table->string('item_unit',80);
            $table->integer('item_qty');
            $table->integer('item_cat_code');
            $table->integer('item_subcat_code');
            $table->integer('item_code');
            $table->string('life_span',80);
            $table->dateTime('date_acquired');
            $table->string('unit_value',80);
            $table->string('total_value',80);
            $table->string('accountable_id',80);
            $table->string('remarks',500);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['inventory_info_id', 'item_unit', 'item_qty','life_span','date_acquired','unit_value','total_value','accountable_id'],'inventory_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_items');
    }
}
