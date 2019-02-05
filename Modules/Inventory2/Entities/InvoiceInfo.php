<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceInfo extends Model
{
    protected $table = 'inv_invoice_info';
    protected $fillable = ['invoice_desc','invoice_supplier_id','date_invoice'];
}
