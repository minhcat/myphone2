<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'address_id',
        'voucher_code',
        'status',
        'note',
        'subtotal',
        'transport_fee',
        'discount',
        'tax',
        'total',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function quantity() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return calc_quantity($this, $attributes);
            },
        );
    }

    public function subtotalDetail() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return calc_total($this, $attributes);
            },
        );
    }
}
