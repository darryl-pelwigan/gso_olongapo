<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class GSOItems extends Model
{
   protected $table = 'inv_gsoprop_code_list';
    protected $fillable = ['gsocode_cat_id','desc','useful_life','code_no'];}
