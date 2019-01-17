<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('inventory_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('control_no',80);
            $table->string('purchase_order_no',80);
            $table->string('invoice_no',80);
            $table->integer('recieved_from_id');
            $table->integer('received_by_id');
            $table->integer('accountable_id');
            $table->date('inv_date');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['control_no', 'purchase_order_no', 'invoice_no', 'recieved_from_id', 'received_by_id'],'inventory_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_info');
    }
}
