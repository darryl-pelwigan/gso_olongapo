<?php

namespace Modules\PurchaseRequest\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseNo extends Model
{
    use SoftDeletes;
    protected $table = 'olongapo_purchase_request_no';
    protected $fillable = ['dept_id','pr_date','pr_count','obr_id'];

    public function pr_items(){
        return $this->hasMany('Modules\PurchaseRequest\Entities\PurchaseItems', 'prno_id');
    }

   public function pr_dept(){
        return $this->belongsTo('Modules\Administrator\Entities\DEPTsubcode', 'dept_id');
    }


   public function pr_obr(){
        return $this->belongsTo('Modules\PurchaseRequest\Entities\OBR', 'obr_id');
    }

    public function bac_type(){
        return $this->belongsTo('Modules\GSOassistant\Entities\Procmethod', 'proc_type');
    }

    public function ppmp(){
        return $this->belongsTo('Modules\BAC\Entities\PurchasePPMPApproval', 'id');
    }

    public function tbl_name(){
        return with(new static)->getTable();
    }
}
