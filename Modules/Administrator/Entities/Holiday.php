<?php

namespace Modules\Administrator\Entities;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'olongapo_holiday';
    protected $fillable = ['Holiday','description']; 
}
