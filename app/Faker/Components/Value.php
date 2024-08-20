<?php

namespace App\Faker\Components;

use App\Faker\Traits\CheckConditions;

class Value
{
    use CheckConditions;

    protected $value;
    protected $rate;
    protected $conditions = [];

    public function __construct($data)
    {
        $this->value        = isset($data['value']) ? $data['value'] : '';
        $this->rate         = isset($data['rate']) ? $data['rate'] : 1;
        if (isset($data['conditions'])) {
            foreach ($data['conditions'] as $conditions) {
                $this->conditions[] = new Condition($conditions);
            }
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}