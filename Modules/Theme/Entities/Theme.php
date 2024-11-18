<?php

namespace Modules\Theme\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $casts = [
        'info_images' => 'array'
    ]; 

    protected $fillable = [
        'name',
        'primary_image',
        'info_images',
        'path',
        'description',
        'author_id',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function setting()
    {
        return $this->hasOne(ThemeSetting::class);
    }
}
