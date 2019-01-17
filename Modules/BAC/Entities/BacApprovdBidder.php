<?php

namespace Modules\BAC\Entities;

use Illuminate\Database\Eloquent\Model;

class BacApprovdBidder extends Model
{
    protected $table = 'olongapo_absctrct_pubbid_apprved';
    protected $fillable = ['pubbid_id','date'];
}
