<?php

namespace Database\Fakers\Components;

use Database\Fakers\Traits\CheckConditions;
use Database\Fakers\Traits\CheckWiths;

class Value
{
    use CheckConditions, CheckWiths;

    protected $value;
    protected $rate;
    protected $conditions = [];
    protected $withs = [];
    protected $max;
    protected $space;

    public function __construct($data)
    {
        $data = array_merge(config('faker.defaults.value'), $data);

        $this->value    = $data['value'];
        $this->rate     = $data['rate'];
        $this->max      = $data['max'];
        $this->space    = $data['space'];
        if (isset($data['conditions'])) {
            foreach ($data['conditions'] as $conditions) {
                $this->conditions[] = new Condition($conditions);
            }
        }
        if (isset($data['withs']) && is_array($data['withs'])) {
            foreach ($data['withs'] as $with) {
                $this->withs[] = new With($with);
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

    public function __set($name, $value)
    {
        if ($name == 'value') {
            $this->value = $value;
        }
    }
}