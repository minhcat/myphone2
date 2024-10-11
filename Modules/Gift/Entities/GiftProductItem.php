<?php

namespace Modules\Gift\Entities;

use App\Enums\TargetType;
use Database\Factories\GiftProductItemFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;
use Modules\User\Entities\User;

class GiftProductItem extends Model
{
    use HasFactory;

    protected $fillable = ['target_type', 'target_id', 'gift_product_id', 'author_id', 'quantity', 'created_at', 'updated_at'];

    public function target()
    {
        if ($this->target_type === TargetType::VARIANT) {
            return $this->belongsTo(Variation::class, 'target_id');
        }
        return $this->belongsTo(Product::class, 'target_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function newFactory()
    {
        return new GiftProductItemFactory();
    }
}
