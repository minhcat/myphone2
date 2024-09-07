<?php

namespace Database\Fakers\Components;

class With
{
    protected $value;
    protected $rate;

    public function __construct($data)
    {
        $data = array_merge(config('faker.defaults.with'), $data);

        $this->value = $data['value'];
        $this->rate  = $data['rate'];
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}