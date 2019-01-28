<?php

namespace Modules\Abstrct\Entities;

use Illuminate\Database\Eloquent\Model;


class AbstrctSupplier extends Model
{
    protected $table = 'olongapo_absctrct_pubbid';
    protected $fillable = ['supplier_id','abstrct_id'];

    public function supplier(){
        return $this->belongsTo('Modules\Inventory\Entities\Supplier', 'supplier_id');
    }

    public function abstrct_supplier_approved(){
        return $this->hasMany('Modules\Abstrct\Entities\AbstrctSupplierApprved', 'pubbid');
    }




}
