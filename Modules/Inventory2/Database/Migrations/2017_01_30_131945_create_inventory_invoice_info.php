<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryInvoiceInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_invoice_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_desc',255);
            $table->integer('invoice_supplier_id')->comment('supplier');
            $table->dateTime('date_invoice');
            $table->softDeletes();
            $table->timestamps();
            $table->index([ 'invoice_supplier_id', 'date_invoice'],'inv_invoice_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_invoice_info');
    }
}
