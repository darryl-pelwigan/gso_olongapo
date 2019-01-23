<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BacControlInfo extends Model
{
	use SoftDeletes;
    protected $table = 'olongapo_bac_control_info';
    protected $fillable = ['bac_control_no','prno_id','bac_date','amount','sourcefund_id','category_id','apprved_pubbid_id','bac_type_id','remarks'];

 	public function pr(){
        return $this->belongsTo('Modules\PurchaseRequest\Entities\PurchaseNo', 'prno_id');
    }

    public function sof(){
        return $this->belongsTo('Modules\BAC\Entities\SourceOfFund', 'sourcefund_id');
    }

    public function ctgry(){
        return $this->belongsTo('Modules\BAC\Entities\bacCategory', 'category_id');
    }

    public function pubbid(){
        return $this->hasMany('Modules\Abstrct\Entities\AbstrctSupplierApprved','pubbid', 'apprved_pubbid_id');
    }
}
