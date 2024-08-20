<?php

namespace App\Faker\Components;

use App\Enums\FakerConditionType;

class Condition
{
    protected $attribute;
    protected $type;
    protected $value;

    public function __construct($data)
    {
        $this->attribute = $data['attribute'];
        $this->type      = isset($data['type']) ? $data['type'] : FakerConditionType::EQUAL;
        $this->value     = $data['value'];
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}