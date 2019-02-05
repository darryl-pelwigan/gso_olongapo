<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',150);
            $table->string('desc')->nullable();
            $table->integer('type')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['title', 'type'],'supplier_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_info');
    }
}
