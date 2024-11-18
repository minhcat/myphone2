<?php

namespace Modules\Theme\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'author_id',
        'sidebar_collapse',
        'menu_skin',
        'sidebar_skin',
        'created_at',
        'updated_at',
    ];
}
