<?php

namespace Modules\Permission\Entities;

use Database\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'key', 'table', 'description', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function newFactory()
    {
        return new PermissionFactory();
    }
}
