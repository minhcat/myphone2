<?php

namespace Modules\Transporter\Entities;

use App\Enums\EstimateTimeType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class TransporterCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'transporter_id',
        'estimate_time_type',
        'estimate_time',
        'author_id',
        'created_at',
        'updated_at'
    ];

    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estimateTimeText(): Attribute
    {
        return Attribute::make(
            get: function(mixed $value, $attributes) {
                if ($this->estimate_time_type == EstimateTimeType::DAY) {
                    return $this->estimate_time == 1 ? '1 day' : $this->estimate_time . ' days';
                } elseif ($this->estimate_time_type == EstimateTimeType::HOUR) {
                    return $this->estimate_time == 1 ? '1 hour' : $this->estimate_time . ' hours';
                } else {
                    return $this->estimate_time;
                }
            }
        );
    }
}
