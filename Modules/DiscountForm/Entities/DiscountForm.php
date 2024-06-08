<?php

namespace Modules\DiscountForm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class DiscountForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'author_id',
        'description',
        'target_type',
        'discount_type',
        'discount_value',
        'disount_minimum',
        'discount_maximum',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
