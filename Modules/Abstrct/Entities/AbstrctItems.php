<?php

namespace Modules\Abstrct\Entities;

use Illuminate\Database\Eloquent\Model;


class AbstrctItems extends Model
{
    protected $table = 'olongapo_absctrct_pubbid_item_suppbid';
    protected $fillable = ['absctrct_id','suppbid','pubbid_id','unit_price','total_price'];

    
}
