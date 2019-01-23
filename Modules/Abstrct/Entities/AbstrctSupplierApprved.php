<?php

namespace Modules\Abstrct\Entities;

use Illuminate\Database\Eloquent\Model;


class AbstrctSupplierApprved extends Model
{
    protected $table = 'olongapo_absctrct_pubbid_apprved';
    protected $fillable = ['*'];

     public function abstrct_supplier(){
        return $this->belongsTo('Modules\Abstrct\Entities\AbstrctSupplier', 'pubbid');
    }
}
