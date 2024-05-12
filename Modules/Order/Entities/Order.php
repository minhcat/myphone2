<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'address_id', 'status', 'note', 'created_at', 'updated_at'];

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
                $cart = $this->find($attributes['id']);
                $details = $cart->details;
                $quantity = 0;
                foreach ($details as $detail) {
                    $quantity += $detail->quantity;
                }
                return $quantity;
            },
        );
    }

    public function total() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $cart = $this->find($attributes['id']);
                $details = $cart->details;
                $total = 0;
                foreach ($details as $detail) {
                    $total += $detail->quantity * $detail->price;
                }
                return number_format($total);
            },
        );
    }
}
