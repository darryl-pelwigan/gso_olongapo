<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;

class BacTemplate extends Model
{
    protected $table = 'olongapo_bac_template';
    protected $fillable = ['template_desc','template','code','type'];
}
