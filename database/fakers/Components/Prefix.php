<?php

namespace Database\Fakers\Components;

use Database\Fakers\Traits\CheckConditions;
use Database\Fakers\Traits\CheckWiths;

class Prefix
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