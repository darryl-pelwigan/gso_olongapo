<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_obr', function (Blueprint $table) {
            $table->increments('id');
            $table->string('obr_no',255);
            $table->date('obr_date');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['obr_no', 'obr_date'],'olongapo_obr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_obr');
    }
}
