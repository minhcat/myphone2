<?php

namespace Database\Fakers\Components;

use App\Enums\FakerConditionType;

class Condition
{
    protected $attribute;
    protected $column;
    protected $type;
    protected $value;

    public function __construct($data)
    {
        $data = array_merge(config('faker.defaults.condition'), $data);

        $this->attribute = $data['attribute'];
        $this->column    = $data['column'];
        $this->type      = $data['type'];
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