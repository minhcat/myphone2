<?php

namespace Modules\Order\Entities;

use Database\Factories\OrderFactory;
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
        'author_id',
        'address_id',
        'transporter_case_id',
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
        return $this->belongsTo(User::class, 'author_id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function case()
    {
        return $this->belongsTo(TransporterCase::class, 'transporter_case_id');
    }

    public function address() 
    {
        return $this->belongsTo(Address::class);
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

    public static function newFactory()
    {
        return new OrderFactory();
    }

    public function updateSubTotal()
    {
        $this->update([
            'subtotal'      => $this->subtotal_detail,
            'total'         => $this->subtotal_detail,
        ]);
    }

    public static function updateSubTotalBulk()
    {
        $orders = static::all();
        foreach ($orders as $order) {
            $order->updateSubTotal();
        }
    }
}
