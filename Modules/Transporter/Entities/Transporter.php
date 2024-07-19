<?php

namespace Modules\Transporter\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Transporter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'author_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
