<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePpeMonthlyReportItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('olongapo_ppe_mnthly_report_items', function (Blueprint $table) {
            $table->string('location')->nullable();
            $table->string('account_group')->nullable();
        });
    }



}
