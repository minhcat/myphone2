<?php

namespace Modules\Gift\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'author_id',
        'start_datetime',
        'end_datetime',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'start_datetime'    => 'datetime',
        'end_datetime'      => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function startdate() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (isset($attributes['start_datetime'])) {
                    $datetime = date_create($attributes['start_datetime']);
                    return date_format($datetime, 'd/m/Y');
                }
                return null;
            },
        );
    }

    public function starttime() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (isset($attributes['start_datetime'])) {
                    $datetime = date_create($attributes['start_datetime']);
                    return date_format($datetime, 'H:i:s');
                }
                return null;
            },
        );
    }

    public function enddate() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (isset($attributes['end_datetime'])) {
                    $datetime = date_create($attributes['end_datetime']);
                    return date_format($datetime, 'd/m/Y');
                }
                return null;
            },
        );
    }

    public function endtime() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (isset($attributes['end_datetime'])) {
                    $datetime = date_create($attributes['end_datetime']);
                    return date_format($datetime, 'H:i:s');
                }
                return null;
            },
        );
    }
}