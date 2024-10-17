<?php

namespace Modules\TransportFee\Entities;

use App\Enums\TotalRangeType;
use Database\Factories\TransportFeeFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Area\Entities\Area;
use Modules\Transporter\Entities\TransporterCase;
use Modules\User\Entities\User;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function case()
    {
        return $this->belongsTo(TransporterCase::class, 'transporter_case_id');
    }

    public function totalRange() : Attribute
    {
        return Attribute::make(
            get: function() {
                $result = '';
                if ($this->total_range_bottom_type == TotalRangeType::EQUAL) {
                    $result .= '[';
                } elseif ($this->total_range_bottom_type == TotalRangeType::NOT_EQUAL) {
                    $result .= '(';
                }
                $result .= number_format($this->total_range_bottom) . ' - ' . ($this->total_range_top === null ? '∞' : number_format($this->total_range_top));
                if ($this->total_range_top_type == TotalRangeType::EQUAL) {
                    $result .= ']';
                } elseif ($this->total_range_top_type == TotalRangeType::NOT_EQUAL) {
                    $result .= ')';
                }
                return $result;
            }
        );
    }

    public static function newFactory()
    {
        return new TransportFeeFactory();
    }
}
