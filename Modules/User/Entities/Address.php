<?php

namespace Modules\User\Entities;

use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Entities\Ward;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'ward_id', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public static function newFactory()
    {
        return new AddressFactory();
    }
}
