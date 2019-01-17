<?php

namespace Modules\Administrator\Entities;

use Illuminate\Database\Eloquent\Model;

class DEPTsubcode extends Model
{
    protected $table = 'olongapo_subdepartment';
    protected $fillable = ['dept_desc','subdept_code','year','dept_id'];

     public function dept(){
        return $this->belongsTo('Modules\Administrator\Entities\DeptCodes', 'dept_id');
    }
}
