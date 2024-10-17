<?php

namespace Database\Fakers\Traits;

use App\Enums\FixType;

trait SequentialGeneration
{
    protected function generateSequentialAttribute($attribute)
    {
        if ($attribute->loop !== null) {
            handle_loop_attribute_session($attribute->loop, $this, $attribute);
        }

        foreach ($attribute->values as $value) {
            if ($value->hasConditions()) {
                if ($value->checkConditions($this->attributes)) {
                    [$time_of_use, $session_name] = get_time_of_use_session($this, $attribute, $value);
                    if ($time_of_use < $value->max) {
                        $attribute->setValue($value->value);
                        session()->put($session_name, $time_of_use + 1);
                        break;
                    }
                }
            } else {
                [$time_of_use, $session_name] = get_time_of_use_session($this, $attribute, $value);
                if ($time_of_use < $value->max) {
                    $attribute->setValue($value->value);
                    session()->put($session_name, $time_of_use + 1);
                    break;
                }
            }
        }

        if (count($attribute->prefixes) > 0) {
            $this->generateSequentialAttributeFixes($attribute, $attribute->prefixes, FixType::PREFIX);
        }

        if (count($attribute->suffixes) > 0) {
            $this->generateSequentialAttributeFixes($attribute, $attribute->suffixes, FixType::SUFFIX);
        }

        return $attribute->value;
    }

    protected function generateSequentialAttributeFixes($attribute, $fixes, $fixtype = FixType::PREFIX)
    {
        foreach ($fixes as $fix) {
            foreach ($fix->values as $fix_value) {
                if ($fix_value->hasConditions()) {
                    if ($fix_value->checkConditions($this->attributes)) {
                        if ($fix_value->hasWiths()) {
                            if ($fix_value->checkWiths($attribute->value, false)) {
                                [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                                if ($time_of_use < $fix_value->max) {
                                    $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                                    session()->put($session_name, $time_of_use + 1);
                                    break;
                                }
                            }
                        } else {
                            [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                            if ($time_of_use < $fix_value->max) {
                                $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                                session()->put($session_name, $time_of_use + 1);
                                break;
                            }
                        }
                    }
                } elseif ($fix_value->hasWiths()) {
                    if ($fix_value->checkWiths($attribute->value, false)) {
                        [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                        if ($time_of_use < $fix_value->max) {
                            $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                            session()->put($session_name, $time_of_use + 1);
                            break;
                        }
                    }
                } else {
                    [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                    if ($time_of_use < $fix_value->max) {
                        $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                        session()->put($session_name, $time_of_use + 1);
                        break;
                    }
                }
            }
        }
    }

    protected function getSequentialResourceId($repository, $session_name, $max_quantity = 1, $where = [])
    {
        $session_array = [];
        if (session()->has($session_name)) {
            $session_array = session()->get($session_name);
        }
        $session_ids = array_values(array_filter(array_map(function($item) use ($max_quantity) {
            if ($item[1] >= $max_quantity) {
                return $item[0];
            }
        }, $session_array), function($item) {
            return $item !== null;
        }));

        $models = $repository->get($where, 0, 10000);
        $models_not_choose = $models->whereNotIn('id', $session_ids)->values();
        if ($models_not_choose->isEmpty()) {
            return null;
        }
        $id = $models_not_choose[0]->id;

        $flag = true;
        $session_array_new = [];
        foreach ($session_array as $item) {
            if ($item[0] == $id) {
                $session_array_new[] = [$item[0], $item[1] + 1];
                $flag = false;
            } else {
                $session_array_new[] = [$item[0], $item[1]];
            }
        }
        if ($flag) {
            $session_array_new[] = [$id, 1];
        }
        session()->put($session_name, $session_array_new);

        return $id;
    }
}