<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsAwardsCommitteeAprrovedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_bac_awards_committee_approved_by', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->comment('refer to olongapo_employee_list');
            $table->string('employee_name');
            $table->string('employee_bacposition');
            $table->string('sequence');
            $table->string('department');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['employee_id'],'olongapo_bac_awards_committee_approved_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_bac_awards_committee_approved_by');
    }
}
