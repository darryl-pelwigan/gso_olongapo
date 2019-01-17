<?php
namespace Modules\PurchaseRequest\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseItems extends Model
{
    use SoftDeletes;
    protected $table = 'olongapo_purchase_request_items';
    protected $fillable = ['prno_id','description','remarks','unit','qty'];

     public function prno(){
        return $this->belongsTo('Modules\PurchaseRequest\Entities\PurchaseNo', 'prno_id');
    }

      public function tbl_name(){
        return with(new static)->getTable();
    }


}
