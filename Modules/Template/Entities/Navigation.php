<?php

namespace Modules\Template\Entities;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'olongapo_tmpl_main_navigation';

    protected $fillable = ['nav_desc','nav_position','nav_position','group_id','properties','right_elements'];
}
