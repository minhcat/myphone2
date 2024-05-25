<?php

namespace Modules\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'author_id',
        'condition_id',
        'discount_form_id',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'start_date'    => 'datetime',
        'end_date'      => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
