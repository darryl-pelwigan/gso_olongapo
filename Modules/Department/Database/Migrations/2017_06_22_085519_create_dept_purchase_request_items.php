<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptPurchaseRequestItems extends Migration
{
  private $table = 'bms_olngp_dept_purchase_request_items';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dept_pr_id')->comment('refer to bms_olngp_dept_purchase_request');
            $table->string('pr_desc');
            $table->decimal('pr_qty',11,2);
            $table->string('pr_unit');
            $table->decimal('pr_unit_price',11,2);
            $table->decimal('pr_total_price',11,2);
            $table->string('remarks');
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
        Schema::dropIfExists($this->table);
    }
}
