<?php

namespace Modules\GSOassistant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Procmethod extends Model
{
	use SoftDeletes;
	protected $table = 'olongapo_procurement_method';
    protected $fillable = ['*'];
		protected $dates = ['deleted_at'];
}
