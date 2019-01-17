<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpeMonthlyReportItems extends Migration
{

    private $table = 'olongapo_ppe_mnthly_report_items';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ppe_mnthly_id')->comment('Refer to olongapo_ppe_mnthly_report');
            $table->string('item_desc');
            $table->string('property_code')->nullable();
            $table->string('po_no')->nullable();
            $table->decimal('qty',11,2)->nullable();
            $table->decimal('unit_value',11,2)->nullable();
            $table->string('unit',100)->nullable();
            $table->decimal('total_value',11,2)->nullable();
            $table->integer('accountable_person')->comment('Refer to olongapo_employee_list')->nullable();
            $table->integer('department')->comment('Refer to olongapo_subdepartment')->nullable();
             $table->integer('supplier')->comment('Refer to supplier_info')->nullable();
            $table->string('invoice')->nullable();
            $table->softDeletes();
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
