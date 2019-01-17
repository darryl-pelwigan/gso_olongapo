<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_order_no', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_no',50);
            $table->integer('dept_id')->comment('Department ID');
            $table->date('po_date');
            $table->integer('prno_id');
            $table->date('date_logged');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['po_date', 'prno_id','dept_id'],'olongapo_purchase_order_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_purchase_order_no');
    }
}
