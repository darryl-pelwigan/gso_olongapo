<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;

class PurchasePPMPApproval extends Model
{
    protected $table = 'olongapo_purchase_request_ppmp_approval';
    protected $fillable = ['request_no_id', 'status', 'remarks', 'ppmp_no', 'ppmp_date'];
}


