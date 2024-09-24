<?php

namespace Modules\Product\Entities;

use Database\Factories\DetailFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Specification\Entities\Information;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'specification_id', 'information_id', 'author_id', 'created_at', 'updated_at'];

    public function information()
    {
        return $this->belongsTo(Information::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function newFactory()
    {
        return new DetailFactory();
    }
}
