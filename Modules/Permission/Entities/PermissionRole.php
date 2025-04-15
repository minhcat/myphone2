<?php

namespace Modules\Permission\Entities;

use Database\Factories\PermissionRoleFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionRole extends Model
{
    use HasFactory;

    protected $table = 'permission_role';
    protected $fillable = ['permission_id', 'role_id'];
    public $timestamps = false;
    
    protected static function newFactory()
    {
        return new PermissionRoleFactory();
    }
}
