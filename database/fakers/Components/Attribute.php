<?php

namespace Database\Fakers\Components;

use App\Enums\FixType;

class Attribute
{
    protected $name;
    protected $generate_type;
    protected $auto_generate;
    protected $values = [];
    protected $value;
    protected $loop;
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
        $this->auto_generate = $data['auto_generate'];
        $this->loop = $data['loop'];

        $data = $this->uncompress($data);
        $data = $this->addValueIndex($data);

        $this->setValueData($data);
        $this->setPrefixData($data);
        $this->setSuffixData($data);

        $this->orderFixes($this->prefixes);
        $this->orderFixes($this->suffixes);
    }

    protected function uncompress($data)
    {
        if (isset($data['is_compress']) && $data['is_compress']) {
            $data['values'] = uncompress($data['values']);
        }

        return $data;
    }

    protected function addValueIndex($data)
    {
        if (isset($data['add_id']) && $data['add_id']) {
            $data['values'] = add_id_to_objects($data['values']);
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

    public function setValueData($data)
    {
        foreach ($data['values'] as $value) {
            $this->values[] = new Value($value);
        }
    }

    public function setPrefixData($data)
    {
        if (isset($data['prefixes']) && is_array($data['prefixes'])) {
            foreach ($data['prefixes'] as $prefix) {
                $this->prefixes[] = new Prefix($prefix);
            }
        }
    }

    public function setSuffixData($data)
    {
        if (isset($data['suffixes']) && is_array($data['suffixes'])) {
            foreach ($data['suffixes'] as $suffix) {
                $this->suffixes[] = new Suffix($suffix);
            }
        }
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
