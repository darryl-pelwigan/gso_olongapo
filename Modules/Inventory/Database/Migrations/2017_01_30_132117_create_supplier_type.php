<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('supplier_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc',150);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['desc'],'supplier_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_type');
    }
}
