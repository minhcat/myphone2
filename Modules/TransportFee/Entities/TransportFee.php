<?php

namespace Modules\TransportFee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author_id',
        'total_range_bottom_type',
        'total_range_bottom',
        'total_range_top_type',
        'total_range_top',
        'area_id',
        'transporter_case_id',
        'cost',
        'created_at',
        'updated_at',
    ];
}
