<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
