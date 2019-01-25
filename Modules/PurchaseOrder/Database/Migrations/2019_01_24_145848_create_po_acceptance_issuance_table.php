<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoAcceptanceIssuanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_order_acceptance_issuance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pono_id')->comment('PR ORDER ID');
            $table->string('aai_no',50);
            $table->date('aai_date');
            $table->string('invoice_no',50);
            $table->date('invoice_date');
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
        Schema::dropIfExists('olongapo_purchase_order_acceptance_issuance');
    }
}
