<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryInfo extends Model
{
    protected $table = 'inventory_info';
    protected $fillable = ['control_no','type','item_qty','accountable_id','inv_date'];
}
