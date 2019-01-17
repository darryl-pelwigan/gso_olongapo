<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ItemCategoryGroup extends Model
{
	use SoftDeletes;
    protected $table = 'olongapo_purchase_item_category_group';
    protected $fillable = ['group'];

    public function item_categ_group(){
        return $this->belongsTo('Modules\BAC\Entities\ItemCategory', 'group_id');
    }

}
