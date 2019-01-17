<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected  $table = 'olongapo_position';
    protected $fillable = ['title'];
}
