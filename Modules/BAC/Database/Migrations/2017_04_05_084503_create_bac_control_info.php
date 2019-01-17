<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacControlInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_bac_control_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bac_control_no',255);
            $table->integer('prno_id')->comment('refer to olongapo_purchase_request_no');
            $table->date('bac_date');
            $table->decimal('amount', 12, 2);
            $table->integer('sourcefund_id')->comment('refer to olongapo_bac_source_fund');
            $table->integer('category_id')->comment('refer to olongapo_bac_category');
            $table->integer('apprved_pubbid_id')->comment('refer to olongapo_absctrct_pubbid_apprved');
            $table->integer('bac_type_id')->comment('refer to olongapo_bac_type');
            $table->text('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['bac_control_no', 'prno_id', 'bac_date', 'amount', 'sourcefund_id', 'category_id', 'bac_type_id'],'olongapo_bac_control_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_bac_control_info');
    }
}
