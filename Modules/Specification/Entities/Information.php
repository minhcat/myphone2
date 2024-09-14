<?php

namespace Modules\Specification\Entities;

use Database\Factories\InformationFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = ['value', 'description', 'author_id', 'specification_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function newFactory()
    {
        return new InformationFactory();
    }
}
