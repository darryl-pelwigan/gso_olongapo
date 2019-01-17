<?php

namespace Modules\PurchaseRequest\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ApproveSupp extends Model
{
 use SoftDeletes;
    protected $table = 'olongapo_approved_supplier';
    protected $fillable = ['pr_no','supp_id'];
}
