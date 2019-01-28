<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class PPEcode extends Model
{
    protected $table = 'inv_ppe_code_category';
    protected $fillable = ['desc'];
}
