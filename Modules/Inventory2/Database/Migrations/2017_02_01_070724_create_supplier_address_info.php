<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierAddressInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->comment('refer to supplier_info id');
            $table->string('province',150)->nullable();
            $table->string('city_mun',150)->nullable();
            $table->string('brgy',150)->nullable();
            $table->string('details',255)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['supplier_id', 'province', 'city_mun', 'brgy'],'supplier_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_address');
    }
}
