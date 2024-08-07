<?php

namespace Modules\Order\Entities;

use App\Enums\TargetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;
use Modules\User\Entities\User;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'target_type', 'target_id', 'price', 'quantity', 'author_id'];
    
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
}
