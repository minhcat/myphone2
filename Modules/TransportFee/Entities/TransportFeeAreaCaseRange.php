<?php

namespace Modules\TransportFee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class TransportFeeAreaCaseRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport_fee_area_case_id',
        'total_range_bottom_type',
        'total_range_bottom',
        'total_range_top_type',
        'total_range_top',
        'author_id',
        'cost',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
