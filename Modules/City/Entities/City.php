<?php

namespace Modules\City\Entities;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname', 'description', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function wards()
    {
        return $this->hasManyThrough(Ward::class, District::class);
    }

    public static function newFactory()
    {
        return new CityFactory();
    }
}
