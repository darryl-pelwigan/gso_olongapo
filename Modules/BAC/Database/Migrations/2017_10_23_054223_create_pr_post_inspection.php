<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrPostInspection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_request_post_inspection', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_no_id')->comment('refer to olongapo_purchase_request_no');
            $table->string('equimentmodel',100);
            $table->string('modelplate',50);
            $table->date('daterepair');
            $table->string('post_inspection_report_no',50);
            $table->string('end_user',50);
            $table->string('name_address_repair_store',255);
            $table->date('date_inspection_report');
            $table->date('date_lto_reg');
            $table->date('date_acquired');
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
        Schema::dropIfExists('olongapo_purchase_request_post_inspection');
    }
}
