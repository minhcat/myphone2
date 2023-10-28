<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'product_id'];
}
