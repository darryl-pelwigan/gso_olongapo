<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemPpmpApproval extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_request_ppmp_approval', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_no_id')->comment('refer to olongapo_purchase_request_no');
            $table->boolean('status');
            $table->string('ppmp_no')->nullable();            
            $table->date('ppmp_date');
            $table->string('remarks')->nullable();            
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
        Schema::dropIfExists('olongapo_purchase_request_ppmp_approval');
    }
}
