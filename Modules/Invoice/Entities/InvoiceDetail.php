<?php

namespace Modules\Invoice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'product_id', 'price', 'quantity'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
