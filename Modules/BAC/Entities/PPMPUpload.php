<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PPMPUpload extends Model
{
	use SoftDeletes;
    protected $table = 'olongapo_purchase_item_ppmp_upload';
    protected $fillable = ['subdept_id', 'year', 'month'];

}
