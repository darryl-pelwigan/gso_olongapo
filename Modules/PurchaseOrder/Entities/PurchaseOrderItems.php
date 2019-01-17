<?php

namespace Modules\PurchaseOrder\Entities;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItems extends Model
{
    protected $table = 'olongapo_purchase_order_items';
    protected $fillable = ['*'];
}
