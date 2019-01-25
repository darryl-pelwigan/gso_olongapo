<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class SupplierAddress extends Model
{
    protected $table = 'supplier_address';
    protected $fillable = ['supplier_id','province','city_mun','brgy','details'];
}
