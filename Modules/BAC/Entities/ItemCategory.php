<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ItemCategory extends Model
{
	use SoftDeletes;
    protected $table = 'olongapo_purchase_item_category';
    protected $fillable = ['group', 'category', 'code'];

    public function item_categ_group(){
        return $this->belongsTo('Modules\Administrator\Entities\PurchaseItems', 'category_id');
    }

    public function item_group(){
        return $this->hasMany('Modules\BAC\Entities\ItemCategoryGroup', 'id');
    }

}
