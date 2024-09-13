<?php

namespace Modules\Specification\Entities;

use Database\Factories\SpecificationFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'author_id', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function informations()
    {
        return $this->hasMany(Information::class);
    }

    public static function newFactory()
    {
        return new SpecificationFactory();
    }
}
