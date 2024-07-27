<?php

namespace Modules\Invoice\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Transporter\Entities\TransporterCase;
use Modules\User\Entities\User;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'author_id',
        'address_id',
        'subtotal',
        'transport_fee',
        'discount',
        'tax',
        'total',
        'note',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function case()
    {
        return $this->belongsTo(TransporterCase::class, 'transporter_case_id');
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
