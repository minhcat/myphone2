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
            $this->generateAttribute($attribute);
        }
    }

    protected function generateAttribute($attribute)
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
            foreach ($attribute->prefixes as $prefix) {
                $rand = lcg_value();
                $rate = 0;
                foreach ($prefix->values as $prefix_value) {
                    if ($prefix_value->hasConditions()) {
                        if ($prefix_value->checkConditions($this->attributes)) {
                            if ($prefix_value->hasWiths()) {
                                if ($prefix_value->checkWiths($attribute->value)) {
                                    $rate += $prefix_value->rate;
                                    if ($rand < $rate) {
                                        $attribute->setValue($prefix_value->value . ' ' . $attribute->value);
                                        break;
                                    }
                                }
                            } else {
                                $rate += $prefix_value->rate;
                                if ($rand < $rate) {
                                    $attribute->setValue($prefix_value->value . ' ' . $attribute->value);
                                    break;
                                }
                            }
                        }
                    } elseif ($prefix_value->hasWiths()) {
                        if ($prefix_value->checkWiths($attribute->value)) {
                            $attribute->setValue($prefix_value->value . ' ' . $attribute->value);
                            break;
                        }
                    } else {
                        $rate += $prefix_value->rate;
                        if ($rand < $rate && $prefix_value->value !== null) {
                            $attribute->setValue($prefix_value->value . ' ' . $attribute->value);
                            break;
                        }
                    }
                }
            }
        }

        if (count($attribute->suffixes) > 0) {
            foreach ($attribute->suffixes as $suffix) {
                $rand = lcg_value();
                $rate = 0;
                foreach ($suffix->values as $suffix_value) {
                    if ($suffix_value->hasConditions()) {
                        if ($suffix_value->checkConditions($this->attributes)) {
                            if ($suffix_value->hasWiths()) {
                                if ($suffix_value->checkWiths($attribute->value)) {
                                    $rate += $suffix_value->rate;
                                    if ($rand < $rate) {
                                        $attribute->setValue($attribute->value . ' ' . $suffix_value->value);
                                        break;
                                    }
                                }
                            } else {
                                $rate += $suffix_value->rate;
                                if ($rand < $rate) {
                                    $attribute->setValue($attribute->value . ' ' . $suffix_value->value);
                                    break;
                                }
                            }
                        }
                    } elseif ($suffix_value->hasWiths()) {
                        if ($suffix_value->checkWiths($attribute->value)) {
                            $attribute->setValue($attribute->value . ' ' . $suffix_value->value);
                            break;
                        }
                    } else {
                        $rate += $suffix_value->rate;
                        if ($rand < $rate) {
                            if ($suffix_value->value !== null) {
                                $attribute->setValue($attribute->value . ' ' . $suffix_value->value);
                            }
                            break;
                        }
                    }
                }
            }
        }
    }
}