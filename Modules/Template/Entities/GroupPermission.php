<?php

namespace Modules\Template\Entities;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    protected $table = 'olongapo_user_groups';

    protected $fillable = ['ugrp_name','ugrp_description','permission_cat_id'];

    public static function getTableName(){
        return with(new static)->getTable();
    }
}
