<?php

namespace Database\Fakers\Traits;

use App\Enums\FixType;

trait RandomGeneration
{
    protected function generateRandomAttribute($attribute)
    {
        $loop = true;
        $values = $attribute->values;
        while ($loop && count($values) > 0) {
            $rand = lcg_value();
            $rate = 0;
            $values_new = [];
            foreach ($values as $value) {
                if ($value->hasConditions()) {
                    if ($value->checkConditions($this->attributes)) {
                        [$time_of_use, $session_name] = get_time_of_use_session($this, $attribute, $value);
                        if ($time_of_use < $value->max) {
                            $values_new[] = $value;
                            $rate += $value->rate;
                            if ($rand < $rate) {
                                $attribute->setValue($value->value);
                                session()->put($session_name, $time_of_use + 1);
                                $loop = false;
                                break;
                            }
                        }
                    }
                } else {
                    [$time_of_use, $session_name] = get_time_of_use_session($this, $attribute, $value);
                    if ($time_of_use < $value->max) {
                        $values_new[] = $value;
                        $rate += $value->rate;
                        if ($rand < $rate) {
                            $attribute->setValue($value->value);
                            session()->put($session_name, $time_of_use + 1);
                            $loop = false;
                            break;
                        }
                    }
                }
            }
            $values = $values_new;
        }

        if (count($attribute->prefixes) > 0) {
            $this->generateRandomAttributeFixes($attribute, $attribute->prefixes, FixType::PREFIX);
        }

        if (count($attribute->suffixes) > 0) {
            $this->generateRandomAttributeFixes($attribute, $attribute->suffixes, FixType::SUFFIX);
        }
    }

    protected function generateRandomAttributeFixes($attribute, $fixes, $fixtype)
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
                                    [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                                    if ($time_of_use < $fix_value->max) {
                                        $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                                        session()->put($session_name, $time_of_use + 1);
                                        break;
                                    }
                                }
                            }
                        } else {
                            $rate += $fix_value->rate;
                            if ($rand < $rate) {
                                [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                                if ($time_of_use < $fix_value->max) {
                                    $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                                    session()->put($session_name, $time_of_use + 1);
                                    break;
                                }
                            }
                        }
                    }
                } elseif ($fix_value->hasWiths()) {
                    if ($fix_value->checkWiths($attribute->value)) {
                        $rate += $fix_value->rate;
                        if ($rand < $rate) {
                            [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                            if ($time_of_use < $fix_value->max) {
                                $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                                session()->put($session_name, $time_of_use + 1);
                                break;
                            }
                        }
                    }
                } else {
                    $rate += $fix_value->rate;
                    if ($rand < $rate) {
                        [$time_of_use, $session_name] = get_time_of_use_fix_session($this, $attribute, $fix_value, $fixtype);
                        if ($time_of_use < $fix_value->max) {
                            if ($fix_value->value !== null) {
                                $attribute->addFix($fix_value->value, $fixtype, $fix_value->space);
                                session()->put($session_name, $time_of_use + 1);
                            }
                            break;
                        }
                    }
                }
            }
        }
    }

    protected function getRandomResourceId($repository, $session_name, $max_quantity = 1000, $where = [])
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

        $models = $repository->get($where);
        $models_not_choose = $models->whereNotIn('id', $session_ids)->values();
        $model_ids = $models_not_choose->pluck('id');
        $max = $model_ids->count() - 1;
        $rand = rand(0, $max);
        $id = $models_not_choose[$rand]->id;

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