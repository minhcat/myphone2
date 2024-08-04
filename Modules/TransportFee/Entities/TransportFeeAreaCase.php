<?php

namespace Modules\TransportFee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Transporter\Entities\TransporterCase;
use Modules\User\Entities\User;

class TransportFeeAreaCase extends Model
{
    use HasFactory;

    protected $fillable = ['transport_fee_area_id', 'transporter_case_id', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function case()
    {
        return $this->belongsTo(TransporterCase::class, 'transporter_case_id');
    }
}
