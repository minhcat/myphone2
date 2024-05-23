<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'note', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function quantity() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return calc_quantity($this, $attributes);
            },
        );
    }

    public function total() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return calc_total($this, $attributes);
            },
        );
    }
}
