<?php

namespace Modules\Attribute\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'author_id',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
