<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierContactInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->comment('refer to supplier_info id');
            $table->string('type',50);
            $table->string('details',50);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['supplier_id', 'type'],'supplier_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_contact');
    }
}
