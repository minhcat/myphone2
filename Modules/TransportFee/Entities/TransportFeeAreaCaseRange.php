<?php

namespace Modules\TransportFee\Entities;

use App\Enums\TotalRangeType;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
}
