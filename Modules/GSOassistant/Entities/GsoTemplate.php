<?php

namespace Modules\GSOassistant\Entities;

use Illuminate\Database\Eloquent\Model;

class GsoTemplate extends Model
{
    protected $table = 'olongapo_gso_template';

    protected $fillable = ['template_desc','template','code'];
}
