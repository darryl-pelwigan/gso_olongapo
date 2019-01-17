<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlongapoPrchseRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_request_no', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requested_by')->comment('refer to olongapo_employee_list');
            $table->string('pr_no')->nullable();
            $table->integer('dept_id')->comment('Department ID');
            $table->string('obr_id')->nullable()->comment('refer to olongapo_obr');
            $table->string('sai_no')->nullable();
            $table->date('sai_date');
            $table->date('pr_date');
            $table->date('pr_date_dept');
            $table->integer('proc_type')->comment('refer to olongapo_procurement_method');
            $table->integer('pr_count')->nullable();
            $table->text('remarks')->nullable();
            $table->text('pr_purpose');
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pr_date', 'pr_no','dept_id','obr_id'],'olongapo_purchase_request_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('olongapo_purchase_request_no');
    }
}
