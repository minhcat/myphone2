<?php

namespace Modules\User\Entities;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Role\Entities\Role;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'firstname',
        'lastname',
        'gender',
        'job',
        'email',
        'password',
        'remember_token',
        'is_admin',
        'created_at',
        'updated_at'
    ];

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'author_id');
    }

    public static function newFactory()
    {
        return new UserFactory();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getRolesListAttribute()
    {
        return implode(', ', $this->roles->pluck('name')->toArray());
    }
}
