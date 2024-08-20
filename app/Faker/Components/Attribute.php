<?php

namespace App\Faker\Components;

class Attribute
{
    protected $name;
    protected $values = [];
    protected $value;
    protected $prefixes = [];
    protected $suffixes = [];

    public function __construct($data)
    {
        $this->name = $data['attribute'];

        foreach ($data['values'] as $value) {
            $this->values[] = new Value($value);
        }

        if (isset($data['prefixes']) && is_array($data['prefixes'])) {
            foreach ($data['prefixes'] as $prefix) {
                $this->prefixes[] = new Prefix($prefix);
            }
        }

        if (isset($data['suffixes']) && is_array($data['suffixes'])) {
            foreach ($data['suffixes'] as $suffix) {
                $this->suffixes[] = new Suffix($suffix);
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

    public function setValue($value)
    {
        $this->value = $value;
    }
}
