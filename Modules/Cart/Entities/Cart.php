<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'note', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
