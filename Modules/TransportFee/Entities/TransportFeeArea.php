<?php

namespace Modules\TransportFee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportFeeArea extends Model
{
    use HasFactory;

    protected $fillable = ['transport_fee_id', 'area_id', 'author_id', 'created_at', 'updated_at'];
}
