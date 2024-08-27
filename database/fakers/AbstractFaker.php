<?php

namespace Database\Fakers;

use Database\Fakers\Components\Attribute;

abstract class AbstractFaker
{
    protected $name;
    protected $generate_type;
    protected $attributes = [];

    abstract public function getData();

    public function __construct()
    {
        $data = $this->getData();

        $this->name = $data['name'];
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
        foreach ($this->attributes as $attribute) {
            $this->generate_attribute($attribute);
        }
    }

    protected function generate_attribute($attribute)
    {
        $rand = lcg_value();
        $rate = 0;
        foreach ($attribute->values as $value) {
            if ($value->hasConditions()) {
                if ($value->checkConditions($this->attributes)) {
                    $rate += $value->rate;
                    if ($rand < $rate) {
                        $attribute->setValue($value->value);
                        break;
                    }
                }
            } else {
                $rate += $value->rate;
                if ($rand < $rate) {
                    $attribute->setValue($value->value);
                    break;
                }
            }
        }

        if (count($attribute->prefixes) > 0) {
            $rand = lcg_value();
            $rate = 0;
            foreach ($attribute->prefixes as $prefix) {
                if ($prefix->hasConditions()) {
                    if ($prefix->checkConditions($this->attributes)) {
                        if ($prefix->hasWiths()) {
                            if ($prefix->checkWiths($attribute->value)) {
                                $rate += $prefix->rate;
                                if ($rand < $rate) {
                                    $attribute->setValue($prefix->value . ' ' . $attribute->value);
                                    break;
                                }
                            }
                        } else {
                            $rate += $prefix->rate;
                            if ($rand < $rate) {
                                $attribute->setValue($prefix->value . ' ' . $attribute->value);
                                break;
                            }
                        }
                    }
                } elseif ($prefix->hasWiths()) {
                    if ($prefix->checkWiths($attribute->value)) {
                        $attribute->setValue($prefix->value . ' ' . $attribute->value);
                        break;
                    }
                } else {
                    $rate += $prefix->rate;
                    if ($rand < $rate && $prefix->value !== null) {
                        $attribute->setValue($prefix->value . ' ' . $attribute->value);
                        break;
                    }
                }
            }
        }

        if (count($attribute->suffixes) > 0) {
            $rand = lcg_value();
            $rate = 0;
            foreach ($attribute->suffixes as $suffix) {
                if ($suffix->hasConditions()) {
                    if ($suffix->checkConditions($this->attributes)) {
                        if ($suffix->hasWiths()) {
                            if ($suffix->checkWiths($attribute->value)) {
                                $rate += $suffix->rate;
                                if ($rand < $rate) {
                                    $attribute->setValue($attribute->value . ' ' . $suffix->value);
                                    break;
                                }
                            }
                        } else {
                            $rate += $suffix->rate;
                            if ($rand < $rate) {
                                $attribute->setValue($attribute->value . ' ' . $suffix->value);
                                break;
                            }
                        }
                    }
                } elseif ($suffix->hasWiths()) {
                    if ($suffix->checkWiths($attribute->value)) {
                        $attribute->setValue($attribute->value . ' ' . $suffix->value);
                        break;
                    }
                } else {
                    $rate += $suffix->rate;
                    if ($rand < $rate) {
                        if ($suffix->value !== null) {
                            $attribute->setValue($attribute->value . ' ' . $suffix->value);
                        }
                        break;
                    }
                }
            }
        }
    }
}