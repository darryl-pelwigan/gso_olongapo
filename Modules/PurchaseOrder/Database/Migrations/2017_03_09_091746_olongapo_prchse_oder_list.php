<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlongapoPrchseOderList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olongapo_purchase_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prno_id')->comment('Purchase Request ID');
            $table->integer('pono_id')->comment('olongapo_purchase_order_no');
            $table->integer('pr_item_id')->comment('olongapo_purchase_request_items');
            $table->decimal('po_amount', 11, 2);
            $table->decimal('po_total', 11, 2);
            $table->string('po_brand');
            $table->date('po_date');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['prno_id', 'pono_id','pr_item_id'],'olongapo_purchase_order_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olongapo_purchase_order_items');
    }
}
