<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;

class SourceOfFund extends Model
{
    protected $table = 'olongapo_bac_source_fund';
    protected $fillable = ['description'];
}
