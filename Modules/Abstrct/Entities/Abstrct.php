<?php

namespace Modules\Abstrct\Entities;

use Illuminate\Database\Eloquent\Model;

class Abstrct extends Model
{
    protected $table = 'olongapo_absctrct';
    protected $fillable = ['prno_id','control_no','abstrct_date'];


    public function pubbid(){
        return $this->hasMany('Modules\Abstrct\Entities\AbstrctSupplier', 'abstrct_id');
    }

    public function approved(){
        return $this->hasManyThrough(
        		'Modules\Abstrct\Entities\AbstrctSupplier',
        		'Modules\Abstrct\Entities\AbstrctSupplierApprved',
        		'pubbid',
				'id',
				'id'
        	);
    }



}
