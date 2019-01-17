<?php

namespace Modules\Administrator\Entities;

use Illuminate\Database\Eloquent\Model;

class DeptCodes extends Model
{
    protected $table = 'olongapo_department';
    protected $fillable = ['dept_desc','dept_code','year'];
}
