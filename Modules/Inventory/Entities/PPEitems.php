<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class PPEitems extends Model
{
    protected $table = 'inv_ppe_code_list';
    protected $fillable = ['ppe_cat_id','ppe_subcat_id','desc','code_no'];
}
