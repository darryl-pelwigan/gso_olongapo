<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRcvedFromInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_rcved_from_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name',80);
            $table->string('l_name',80);
            $table->string('m_name',80);
            $table->string('e_name',80);
            $table->integer('position');
            $table->dateTime('date_received');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['f_name', 'l_name', 'm_name', 'e_name', 'position','date_received'],'inventory_rcved_from_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_rcved_from_info');
    }
}
