<?php

namespace Modules\Condition\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author_id', 'description', 'value', 'handler', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
