<?php

namespace Modules\PurchaseRequest\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseNo extends Model
{
    /**
     * test
     */
    use SoftDeletes;
    protected $table = 'olongapo_purchase_request_no';
    protected $fillable = ['requested_by','designated_req','name_avail','designation_avail','name_app','designation_app','pr_no','dept_id','obr_id','sai_no','sai_date','pr_date','pr_date_dept','proc_type','pr_count','remarks','pr_purpose','status','pr_purelyconsumption','added_by','iau_verified','iau_vdate','budget_verified','budget_vdate'];

    public function pr_items(){
        return $this->hasMany('Modules\PurchaseRequest\Entities\PurchaseItems', 'prno_id');
    }

   public function pr_dept(){
        return $this->belongsTo('Modules\Administrator\Entities\DEPTsubcode', 'dept_id');
    }

    public function monthly_report(){
        return $this->hasOne('Modules\Inventory\Entities\PpeMnthlyReport', 'pono_id');
    }

    public function abstrct(){
        return $this->hasOne('Modules\Abstrct\Entities\Abstrct', 'prno_id');
    }

    public function pr_orderno(){
        return $this->hasOne('Modules\PurchaseOrder\Entities\PurchaseOrderNo', 'prno_id');
    }

    public function bac_info(){
        return $this->hasOne('Modules\BAC\Entities\BacControlInfo', 'prno_id');
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
