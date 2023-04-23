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
        'slug',
        'number',
        'description',
        'status',
        'note',
        'created_at',
        'updated_at',
    ];

    public function getNumberFormatAttribute()
    {
        return number_format($this->number);
    }

    protected function createdAt() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('H:i:s d/m/Y', strtotime($value))
        );
    }

    protected function updatedAt() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('H:i:s d/m/Y', strtotime($value))
        );
    }
}
