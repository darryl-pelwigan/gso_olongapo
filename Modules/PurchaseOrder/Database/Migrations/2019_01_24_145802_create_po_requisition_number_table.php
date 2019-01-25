<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoRequisitionNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_order_requisition_number', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pono_id')->comment('PR ORDER ID');
            $table->string('ris_no',50);
            $table->date('ris_date');
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
        Schema::dropIfExists('olongapo_purchase_order_requisition_number');
    }
}
