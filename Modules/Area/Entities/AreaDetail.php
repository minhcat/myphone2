<?php

namespace Modules\Area\Entities;

use App\Enums\TerritoryType;
use Database\Factories\AreaDetailFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Entities\City;
use Modules\City\Entities\District;
use Modules\City\Entities\Ward;
use Modules\User\Entities\User;

class AreaDetail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'area_id', 'author_id', 'territory_type', 'territory_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function territory()
    {
        if ($this->territory_type === TerritoryType::CITY) {
            return $this->belongsTo(City::class, 'territory_id');
        } elseif ($this->territory_type === TerritoryType::DISTRICT) {
            return $this->belongsTo(District::class, 'territory_id');
        } else {
            return $this->belongsTo(Ward::class, 'territory_id');
        }
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'territory_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'territory_id');
    }

    public static function newFactory()
    {
        return new AreaDetailFactory();
    }
}
