<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlongapoPrchaseRequestItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'olongapo_purchase_request_items';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prno_id')->comment('refer to olongapo_purchase_request_no');
            $table->string('description');
            $table->decimal('qty',11,2);
            $table->string('unit');
            $table->decimal('unit_price',11,2);
            $table->decimal('total_price',11,2);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists($this->table);
    }
}
