<?php

namespace Modules\PurchaseOrder\Entities;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderAcceptance extends Model
{
    protected $table = 'olongapo_purchase_order_acceptance_issuance';
    protected $fillable = ['pono_id','aai_no','aai_date','invoice_no', 'invoice_date','date_received','status','property_officer','date_inspected','inspected','inspector_officer'.];


}
