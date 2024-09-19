<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;

trait ModelComparation
{
    public function is($model)
    {
        if ($model instanceof Model) {
            return $this->getKey() == $model->getKey();
        }
        return false;
    }
}