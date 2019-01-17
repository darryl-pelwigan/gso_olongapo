<?php

namespace Modules\Abstrct\Entities;

use Illuminate\Database\Eloquent\Model;

class Abstrct extends Model
{
    protected $table = 'olongapo_absctrct';
    protected $fillable = ['prno_id','control_no','abstrct_date'];
}
