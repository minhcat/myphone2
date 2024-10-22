<?php

namespace Modules\Role\Entities;

use Database\Factories\RoleUserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];
    public $timestamps = false;
    
    protected static function newFactory()
    {
        return new RoleUserFactory();
    }
}
