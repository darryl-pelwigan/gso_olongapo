<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AwardsCommittee extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'olongapo_bac_awards_committee';
    protected $fillable = ['employee_id','employee_name','employee_bacposition','sequence', 'department'];
}
