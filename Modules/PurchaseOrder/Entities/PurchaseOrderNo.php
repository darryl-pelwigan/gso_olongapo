<?php

namespace Modules\PurchaseOrder\Entities;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderNo extends Model
{
    protected $table = 'olongapo_purchase_order_no';
    protected $fillable = ['po_no','dept_id','po_date','prno_id','bac_control_id','date_logged','date_receive','status','prop_officer','date_inspect','insp','insp_officer'];

      public function pr_request(){
        return $this->belongsTo('Modules\PurchaseRequest\Entities\PurchaseNo', 'dept_id');
    }
}
