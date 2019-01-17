<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseItems extends Model
{
	use SoftDeletes;
    protected $table = 'olongapo_purchase_items';
    protected $fillable = ['category_id', 'item', 'unit'];

    public function item_category(){
        return $this->hasMany('Modules\BAC\Entities\ItemCategory', 'category_id');
    }
}
