<?php

namespace Modules\City\Entities;

use Database\Factories\WardFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname', 'description', 'district_id', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function nameMore() : Attribute
    {
        return Attribute::make(
            get: function(mixed $value, array $attributes) {
                $district = $this->district;
                return $attributes['name'] . ', ' . $district->shortname . ', ' . $district->city->shortname;
            }
        );
    }

    public static function newFactory()
    {
        return new WardFactory();
    }
}
