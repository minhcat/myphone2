<?php

namespace Database\Fakers\Components;

use App\Enums\FixType;
use App\Enums\GenerateType;

class Attribute
{
    protected $name;
    protected $generate_type;
    protected $values = [];
    protected $value;
    protected $origin;
    protected $prefixes = [];
    protected $suffixes = [];
    protected $prefixes_selected = [];
    protected $suffixes_selected = [];

    public function __construct($data)
    {
        $data = array_merge(config('faker.defaults.attribute'), $data);

        $this->name = $data['attribute'];
        $this->generate_type = $data['generate_type'];

        $data = $this->uncompress($data);

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

        $this->orderFixes($this->prefixes);
        $this->orderFixes($this->suffixes);
    }

    protected function uncompress($data)
    {
        if (isset($data['is_compress']) && $data['is_compress']) {
            $data['values_compress'] = $data['values'];
            $data['values'] = [];
            if (isset($data['values_compress']['length'])) {
                $length = $data['values_compress']['length'];
            } else {
                $min = INF;
                foreach ($data['values_compress'] as $item) {
                    if (is_array($item) && count($item) < $min) {
                        $min = count($item);
                    }
                }
                $length = $min;
            }

            for ($i = 0; $i < $length; $i++) {
                if (is_array($data['values_compress']['value'])) {
                    $value = $data['values_compress']['value'][$i];
                } else {
                    $value = $data['values_compress']['value'];
                }

                if (is_array($data['values_compress']['rate'])) {
                    $rate = $data['values_compress']['rate'][$i];
                } else {
                    $rate = $data['values_compress']['rate'];
                }
                $data['values'][] = [
                    'value' =>  $value,
                    'rate'  =>  $rate,
                ];
            }
        }

        return $data;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function setValue($value, $origin = true)
    {
        if ($origin) {
            $this->origin = $value;
        }
        $this->value = $value;
    }

    public function addPrefix($prefix, $space = true)
    {
        $this->prefixes_selected[] = $prefix;
        if ($space) {
            $this->value = $prefix . ' ' . $this->value;
        } else {
            $this->value = $prefix . $this->value;
        }
    }

    public function addSuffix($suffix, $space = true)
    {
        $this->suffixes_selected[] = $suffix;
        if ($space) {
            $this->value = $this->value . ' ' . $suffix;
        } else {
            $this->value = $this->value . $suffix;
        }
    }

    public function addFix($fix, $fixtype, $space = true)
    {
        if ($fixtype == FixType::PREFIX) {
            $this->addPrefix($fix, $space);
        } else {
            $this->addSuffix($fix, $space);
        }
    }

    protected function orderFixes(&$fixes)
    {
        usort($fixes, function($fix1, $fix2) {
            return $fix1->order - $fix2->order;
        });
    }
}
