<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EmployeeCredentials extends Model
{
	use SoftDeletes;
    protected $table = 'olongapo_user_credentials';
    protected $fillable = ['ucrd_realname','ucrd_username','password','employee_id','ucrd_email','group_id','','is_approved'];
}
