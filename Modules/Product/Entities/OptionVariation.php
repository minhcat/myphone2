<?php

namespace Modules\Product\Entities;

use Database\Factories\OptionVariationFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionVariation extends Model
{
    use HasFactory;

    protected $table = 'option_variation';
    protected $fillable = ['option_id', 'variation_id'];
    public $timestamps = false;
    
    protected static function newFactory()
    {
        return new OptionVariationFactory();
    }
}
