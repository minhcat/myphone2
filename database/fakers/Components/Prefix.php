<?php

namespace Database\Fakers\Components;

class Prefix
{
    protected $order;
    protected $values;

    public function __construct($data)
    {
        $this->order  = $data['order'];
        foreach ($data['values'] as $value) {
            $this->values[] = new Value($value);
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