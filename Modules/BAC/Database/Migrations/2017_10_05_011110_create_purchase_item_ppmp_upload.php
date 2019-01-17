<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemPpmpUpload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_item_ppmp_upload', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subdept_id')->comment('refer to olongapo_subdepartment');
            $table->string('year');
            $table->string('month');
            $table->string('file_upload');
            $table->text('remarks');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['subdept_id'], 'olongapo_purchase_item_ppmp_upload');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_purchase_item_ppmp_upload');
    }
}
