<?php

namespace Modules\GSOassistant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requestordersignee extends Model
{
	use SoftDeletes;
	protected $table = 'olongapo_purchase_request_signee';
    protected $fillable = ['*'];
    protected $dates = ['deleted_at'];

    public function dept(){
    	return $this->hasOne('Modules\Administrator\Entities\DEPTsubcode','emp_department');
    }
}
