<?php

namespace Modules\Example\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'note',
        'created_at',
        'updated_at',
    ];
}
