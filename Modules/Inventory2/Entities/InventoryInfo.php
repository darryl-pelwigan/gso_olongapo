<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryInfo extends Model
{
    protected $table = 'inventory_info';
    protected $fillable = ['control_no','purchase_order_no','invoice_no','recieved_from_id','received_by_id','accountable_id','inv_date'];
}
