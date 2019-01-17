<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptPurchaseRequest extends Migration
{
    private $table = 'bms_olngp_dept_purchase_request';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->comment('refer to olongapo_subdepartment');
            $table->integer('requestor_user_id')->comment('refer to olongapo_employee_list');
            $table->text('pr_purpose');
            $table->date('pr_date');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['id', 'department_id', 'requestor_user_id', 'pr_date'], $this->table);
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
