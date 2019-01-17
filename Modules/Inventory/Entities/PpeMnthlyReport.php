<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class PpeMnthlyReport extends Model
{
    protected $table = 'olongapo_ppe_mnthly_report';
    protected $fillable = [];

     public function inv_items(){
        return $this->hasMany('Modules\Inventory\Entities\PpeMnthlyReportItems', 'ppe_mnthly_id');
    }

       public function inv_dept(){
        return $this->belongsTo('Modules\Administrator\Entities\DEPTsubcode', 'department');
    }


     public function tbl_name(){
        return with(new static)->getTable();
    }
}
