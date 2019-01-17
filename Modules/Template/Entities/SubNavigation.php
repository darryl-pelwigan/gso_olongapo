<?php

namespace Modules\Template\Entities;

use Illuminate\Database\Eloquent\Model;

class SubNavigation extends Model
{
    protected $table = 'olongapo_tmpl_sub_navigation';
     protected $casts = [
        'properties' => 'array',
    ];
    protected $fillable = ['parent_id','title','route','arangement','properties'];
}
