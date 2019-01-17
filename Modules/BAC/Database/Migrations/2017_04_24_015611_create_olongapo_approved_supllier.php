<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlongapoApprovedSupllier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('olongapo_approved_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_no')->comment('refer to olongapo_purchase_request_no');
            $table->integer('supp_id')->comment('refer to supplier_info');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pr_no', 'supp_id'],'olongapo_approved_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_approved_supplier');
    }
}
