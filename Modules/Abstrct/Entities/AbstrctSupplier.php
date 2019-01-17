<?php

namespace Modules\Abstrct\Entities;

use Illuminate\Database\Eloquent\Model;


class AbstrctSupplier extends Model
{
    protected $table = 'olongapo_absctrct_pubbid';
    protected $fillable = ['supplier_id','abstrct_id'];
}
