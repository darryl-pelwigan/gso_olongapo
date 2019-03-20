<?php

namespace Modules\PurchaseOrder\Entities;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderRequisition extends Model
{
    protected $table = 'olongapo_purchase_order_requisition_number';
    protected $fillable = ['pono_id','ris_no','ris_date'];

}
