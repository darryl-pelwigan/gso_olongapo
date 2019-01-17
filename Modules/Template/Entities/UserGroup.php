<?php

namespace Modules\Template\Entities;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use Auditable;

    protected $table = 'olongapo_user_groups';
    protected $fillable = ['ugrp_name', 'ugrp_description', 'ugrp_homepage'];

    public function userCredentials() {
        return $this->hasMany('Modules\Template\Entities\UserCredentials', 'group_id');
    }

    public static function table() {
        return with(new static)->getTable();
    }
}
