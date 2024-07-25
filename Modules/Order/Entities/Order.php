<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Transporter\Entities\TransporterCase;
use Modules\User\Entities\Address;
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

    public function cases()
    {
        return $this->belongsToMany(TransporterCase::class);
    }

    public function addresses() 
    {
        return $this->belongsToMany(Address::class);
    }

    public function case() : Attribute
    {
        return Attribute::make(
            get: function() {
                $cases = $this->cases;
                if ($cases->isEmpty()) {
                    return null;
                }
                return $cases[0];
            }
        );
    }

    public function address() : Attribute
    {
        return Attribute::make(
            get: function() {
                $addresses = $this->addresses;
                if ($addresses->isEmpty()) {
                    return null;
                }
                return $addresses[0];
            }
        );
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
