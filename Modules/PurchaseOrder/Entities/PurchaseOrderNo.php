<?php

namespace Modules\PurchaseOrder\Entities;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderNo extends Model
{
    protected $table = 'olongapo_purchase_order_no';
    protected $fillable = ['po_no','dept_id','po_date','prno_id'];
}
