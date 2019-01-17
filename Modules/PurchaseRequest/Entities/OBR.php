<?php

namespace Modules\PurchaseRequest\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OBR extends Model
{
    use SoftDeletes;
    protected $table = 'olongapo_obr';
    protected $fillable = ['obr_no','obr_date'];
}
