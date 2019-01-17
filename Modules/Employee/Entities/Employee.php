<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
	use SoftDeletes;
    protected  $table = 'olongapo_employee_list';
    protected $fillable = ['dept_id','position_id','fname','lname','mname','ename','sex','mobile','email','bdate'];
}
