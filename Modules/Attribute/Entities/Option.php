<?php

namespace Modules\Attribute\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'description', 'author_id', 'attribute_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
