<?php

namespace Database\Fakers;

use App\Enums\FakerConditionType;
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

        $this->beforeGenerate();
        $this->generate();
        $this->afterGenerate();
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

    public function attribute($attribute_name)
    {
        foreach ($this->attributes as $attr) {
            if ($attr->name == $attribute_name) {
                return $attr;
            }
        }
    }

    protected function beforeGenerate() {}

    protected function afterGenerate() {}

    protected function generate()
    {
        foreach ($this->attributes as $attribute) {
            $this->generateAttribute($attribute);
        }
    }

    protected function generateAttribute($attribute)
    {
        $flag = false;
        if (is_string($attribute)) {
            $flag = true;
            foreach ($this->attributes as $attr) {
                if ($attr->name === $attribute) {
                    $attribute = $attr;
                    $flag = false;
                }
            }
        }
        if ($flag) {
            return;
        }

        if ($this->generate_type == GenerateType::RANDOM) {
            $this->generateRandomAttribute($attribute);
        } else {
            $this->generateSequentialAttribute($attribute);
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

    protected function buildResourceId($repository, $attribute_name)
    {
        $models = $repository->all();

        foreach ($this->attributes as $attribute) {
            if ($attribute->name === $attribute_name) {
                foreach ($attribute->values as $value) {
                    foreach ($value->conditions as $condition) {
                        foreach ($models as $model) {
                            if ($model[$condition->column] !== null) {
                                if ($condition->type === FakerConditionType::EQUAL && $model[$condition->column] === $condition->value)  {
                                    $value->value = $model->id;
                                    break 2;
                                }
                            }
                        }
                    }
                }
                break;
            }
        }
    }
}