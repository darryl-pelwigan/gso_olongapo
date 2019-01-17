<?php

namespace Modules\Template\Entities;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainNavigation extends Model
{
    use Auditable;
    use SoftDeletes;
    protected $table = 'olongapo_tmpl_main_navigation';
    protected $casts = [
                            'properties' => 'array',
                        ];
    protected $fillable = ['group_id','title','route','parent','arangement','properties','deleted_at'];
}
