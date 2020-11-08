<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use SIRVOTO\User;

class UserRole extends Model
{
    protected $table = 'model_has_roles';

    public function getRole()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'model_id');
    }
}
