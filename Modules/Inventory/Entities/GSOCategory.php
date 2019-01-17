<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class GSOCategory extends Model
{
	protected $table = 'inv_gsoprop_code_category';
    protected $fillable = ['desc','code_family'];
}
