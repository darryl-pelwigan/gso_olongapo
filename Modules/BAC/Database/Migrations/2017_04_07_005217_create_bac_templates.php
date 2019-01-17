<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_bac_template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template_desc');
            $table->text('template');
            $table->text('code');
            // $table->integer('type')->comment('Refer to olongapo_bac_type');
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
        Schema::dropIfExists('olongapo_bac_template');
    }
}
