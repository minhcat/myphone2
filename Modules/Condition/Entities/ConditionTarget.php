<?php

namespace Modules\Condition\Entities;

use App\Enums\ConditionTargetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;
use Modules\Tag\Entities\Tag;

class ConditionTarget extends Model
{
    use HasFactory;

    protected $fillable = ['condition_id', 'parent_id', 'target_type', 'target_id'];

    public function parent()
    {
        return $this->belongsTo(ConditionTarget::class, 'parent_id');
    }

    public function target()
    {
        if (isset($this->target_type) && $this->target_type == ConditionTargetType::PRODUCT) {
            return $this->belongsTo(Product::class, 'target_id');
        }
        if (isset($this->target_type) && $this->target_type == ConditionTargetType::VARIANT) {
            return $this->belongsTo(Variation::class, 'target_id');
        }
        if (isset($this->target_type) && $this->target_type == ConditionTargetType::CATEGORY) {
            return $this->belongsTo(Category::class, 'target_id');
        }
        if (isset($this->target_type) && $this->target_type == ConditionTargetType::TAG) {
            return $this->belongsTo(Tag::class, 'target_id');
        }
        return $this->belongsTo(Product::class, 'target_id');
    }
}
