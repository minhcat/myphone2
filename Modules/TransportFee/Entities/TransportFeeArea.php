<?php

namespace Modules\TransportFee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Area\Entities\Area;
use Modules\User\Entities\User;

class TransportFeeArea extends Model
{
    use HasFactory;

    protected $fillable = ['transport_fee_id', 'area_id', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
