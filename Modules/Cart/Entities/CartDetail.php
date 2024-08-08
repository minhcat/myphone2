<?php

namespace Modules\Cart\Entities;

use App\Enums\TargetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;
use Modules\User\Entities\User;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'target_type', 'target_id', 'price', 'author_id', 'quantity'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function target()
    {
        if ($this->target_type === TargetType::VARIANT) {
            return $this->belongsTo(Variation::class, 'target_id');
        }
        return $this->belongsTo(Product::class, 'target_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
