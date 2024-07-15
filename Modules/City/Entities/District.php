<?php

namespace Modules\City\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'city_id', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
