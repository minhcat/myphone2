<?php

namespace Modules\City\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname', 'description', 'city_id', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function nameMore() : Attribute
    {
        return Attribute::make(
            get: function(mixed $value, array $attributes) {
                $city = $this->city;
                return $attributes['name'] . ', ' . $city->shortname;
            }
        );
    }
}
