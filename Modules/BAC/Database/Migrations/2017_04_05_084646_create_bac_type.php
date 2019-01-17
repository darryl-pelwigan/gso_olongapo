<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_bac_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',255);
            $table->softDeletes();
            $table->timestamps();
            // $table->index(['description'],'olongapo_bac_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_bac_type');
    }
}
