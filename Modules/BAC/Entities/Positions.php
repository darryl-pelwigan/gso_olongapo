<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $table = 'olongapo_position';
    protected $fillable = ['title'];
}
