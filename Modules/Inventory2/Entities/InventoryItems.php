<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryItems extends Model
{
    protected $table = 'inventory_items';
    protected $fillable = ['inventory_info_id','item_desc','item_unit','item_qty','item_cat_code','item_subcat_code','item_code','life_span','date_acquired','unit_value','total_value','accountable_id','remarks'];
}
