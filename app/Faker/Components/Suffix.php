<?php

namespace App\Faker\Components;

use App\Faker\Traits\CheckConditions;
use App\Faker\Traits\CheckWiths;

class Suffix
{
    use CheckConditions, CheckWiths;

    protected $value;
    protected $rate;
    protected $with;
    protected $withs = [];
    protected $conditions = [];

    public function __construct($data)
    {
        $this->value = $data['value'];
        $this->rate  = $data['rate'];

        if (isset($data['withs']) && is_array($data['withs'])) {
            foreach ($data['withs'] as $with) {
                $this->withs[] = new Value($with);
            }
        }

        if (isset($data['conditions']) && is_array($data['conditions'])) {
            foreach ($data['conditions'] as $condition) {
                $this->conditions[] = new Condition($condition);
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