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
        $this->name = $data['attribute'];
        $this->generate_type = isset($data['generate_type']) ? $data['generate_type'] : GenerateType::RANDOM;

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

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function setValue($value, $origin = false)
    {
        if ($origin) {
            $this->origin = $value;
        }
        $this->value = $value;
    }

    public function addPrefix($prefix)
    {
        $this->prefixes_selected[] = $prefix;
        $this->value = $prefix . ' ' . $this->value;
    }

    public function addSuffix($suffix)
    {
        $this->suffixes_selected[] = $suffix;
        $this->value = $this->value . ' ' . $suffix;
    }

    public function addFix($fix, $fixtype)
    {
        if ($fixtype == FixType::PREFIX) {
            $this->addPrefix($fix);
        } else {
            $this->addSuffix($fix);
        }
    }

    protected function orderFixes(&$fixes)
    {
        usort($fixes, function($fix1, $fix2) {
            return $fix1->order - $fix2->order;
        });
    }
}
