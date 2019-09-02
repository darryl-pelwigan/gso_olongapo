<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class PpeMnthlyReportItems extends Model
{
    protected $table = 'olongapo_ppe_mnthly_report_items';
    protected $fillable = ['ppe_mnthly_id',
                                            'item_desc',
                                            'property_code',
                                            'po_no',
                                            'unit',
                                            'qty',
                                            'unit_value',
                                            'total_value',
                                            'accountable_person',
                                            'department',
                                            'supplier',
                                            'invoice',
                                            'est_life',
                                            'location',
                                            'depreciable'];

    public function inv(){
        return $this->belongsTo('Modules\Inventory\Entities\PpeMnthlyReport', 'ppe_mnthly_id');
    }

    public function pr_item_id(){
        return $this->belongsTo('Modules\BAC\Entities\PurchaseItems', 'prno_item_id');
    }

    public function accountable(){
        return $this->belongsTo('Modules\Employee\Entities\Employee', 'accountable_person');
    }

    public function dept(){
        return $this->belongsTo('Modules\Administrator\Entities\DeptCodes', 'department');
    }

    public function supplier_info(){
        return $this->belongsTo('Modules\Inventory\Entities\Supplier', 'supplier');
    }


    public function tbl_name(){
        return with(new static)->getTable();
    }

}
