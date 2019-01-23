<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class PpeMnthlyReportItems extends Model
{
    protected $table = 'olongapo_ppe_mnthly_report_items';
    protected $fillable = ['*'];

    public function inv(){
        return $this->belongsTo('Modules\Inventory\Entities\PpeMnthlyReport', 'ppe_mnthly_id');
    }

    public function pr_item_id(){
        return $this->belongsTo('Modules\BAC\Entities\PurchaseItems', 'prno_item_id');
    }


    public function tbl_name(){
        return with(new static)->getTable();
    }

}
