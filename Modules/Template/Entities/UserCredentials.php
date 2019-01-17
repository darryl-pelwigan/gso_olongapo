<?php

namespace Modules\Template\Entities;

use OwenIt\Auditing\Auditable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserCredentials extends Authenticatable
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'olongapo_user_credentials';
    protected $fillable = ['ucrd_realname', 'ucrd_username', 'password', 'ucrd_email', 'group_id'];
    protected $dontKeepAuditOf = ['password'];

    public function userGroup() {
        return $this->belongsTo('Modules\Template\Entities\UserGroup', 'group_id');
    }

    public static function table() {
        return with(new static)->getTable();
    }

    public function pbi_application() {
        return $this->hasMany('Modules\OSAC\Entities\PbiApplication', 'applicant_representative_id');
    }

    public function gatepass() {
        return $this->hasMany('Modules\OSAC\Entities\Gatepass', 'jhsez_admin_id');
    }
}
