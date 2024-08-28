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
            $this->generateAttributeFixes($attribute, $attribute->prefixes, function ($value, $fixValue) {
                return $fixValue . ' ' . $value;
            });
        }

        if (count($attribute->suffixes) > 0) {
            $this->generateAttributeFixes($attribute, $attribute->suffixes, function($value, $fixValue) {
                return $value . ' ' . $fixValue;
            });
        }
    }

    protected function generateAttributeFixes($attribute, $fixes, $handleValue)
    {
        foreach ($fixes as $fix) {
            $rand = lcg_value();
            $rate = 0;
            foreach ($fix->values as $fix_value) {
                if ($fix_value->hasConditions()) {
                    if ($fix_value->checkConditions($this->attributes)) {
                        if ($fix_value->hasWiths()) {
                            if ($fix_value->checkWiths($attribute->value)) {
                                $rate += $fix_value->rate;
                                if ($rand < $rate) {
                                    $attribute->setValue(trim($handleValue($attribute->value, $fix_value->value)));
                                    break;
                                }
                            }
                        } else {
                            $rate += $fix_value->rate;
                            if ($rand < $rate) {
                                $attribute->setValue(trim($handleValue($attribute->value, $fix_value->value)));
                                break;
                            }
                        }
                    }
                } elseif ($fix_value->hasWiths()) {
                    if ($fix_value->checkWiths($attribute->value)) {
                        $attribute->setValue(trim($handleValue($attribute->value, $fix_value->value)));
                        break;
                    }
                } else {
                    $rate += $fix_value->rate;
                    if ($rand < $rate) {
                        if ($fix_value->value !== null) {
                            $attribute->setValue(trim($handleValue($attribute->value, $fix_value->value)));
                        }
                        break;
                    }
                }
            }
        }
    }
}