<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class PPEsubcode extends Model
{
    protected $table = 'inv_ppe_code_subcategory';
    protected $fillable = ['ppe_cat_id','desc','code_coa','code_family'];
}
