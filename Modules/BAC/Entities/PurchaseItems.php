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

    public function inventory(){
        return $this->hasOne('Modules\Inventory\Entities\PpeMnthlyReportItems', 'prno_item_id');
    }

    public function abstrct_approved(){
        return $this->hasOne('Modules\Abstrct\Entities\AbstrctSupplierApprved', 'pr_item_id');
    }
}
