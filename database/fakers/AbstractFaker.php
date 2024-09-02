<?php

namespace Database\Fakers;

use App\Enums\GenerateType;
use Database\Fakers\Components\Attribute;
use Database\Fakers\Traits\RandomGeneration;
use Database\Fakers\Traits\SequentialGeneration;

abstract class AbstractFaker
{
    use RandomGeneration, SequentialGeneration;

    protected $faker_name;
    protected $generate_type;
    protected $attributes = [];

    abstract public function getData();

    public function __construct()
    {
        $data = $this->getData();

        $this->faker_name = $data['name'];
        $this->generate_type = $data['generate_type'];

        foreach ($data['attributes'] as $attribute) {
            $this->attributes[] = new Attribute($attribute);
        }

        $this->generate();
    }

    public function __get($attribute)
    {
        foreach ($this->attributes as $attr) {
            if ($attr->name == $attribute) {
                return $attr->value;
            }
        }
        if (property_exists($this, $attribute)) {
            return $this->$attribute;
        }
        return null;
    }

    public function __set($attribute, $value)
    {
        foreach ($this->attributes as $attr) {
            if ($attr->name == $attribute) {
                $attr->setValue($value);
                break;
            }
        }
    }

    public function generate()
    {
        if ($this->generate_type == GenerateType::RANDOM) {
            foreach ($this->attributes as $attribute) {
                $this->generateRandomAttribute($attribute);
            }
        } else {
            foreach ($this->attributes as $attribute) {
                $this->generateSequentialAttribute($attribute);
            }
        }
    }

    protected function getResourceId($repository, $session_array, $max_quantity = 1)
    {
        if ($this->generate_type == GenerateType::RANDOM) {
            return $this->getRandomResourceId($repository, $session_array, $max_quantity);
        } else {
            return $this->getSequentialResourceId($repository, $session_array, $max_quantity);
        }
    }
}