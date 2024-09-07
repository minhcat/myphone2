<?php

namespace Database\Fakers\Traits;

trait CheckWiths
{
    public function hasWiths()
    {
        if (count($this->withs) > 0) {
            return true;
        }
        return false;
    }

    public function checkWiths($value, $rand_check = true)
    {
        $rate = 0;
        foreach ($this->withs as $with) {
            if (is_array($with->value)) {
                foreach ($with->value as $with_value) {
                    if ($with_value === $value) {
                        if ($rand_check) {
                            $rand = lcg_value();
                            $rate += $with->rate;
                            if ($rand < $rate) {
                                return true;
                            }
                        } else {
                            return true;
                        }
                    }
                }
            } elseif ($with->value === $value) {
                if ($rand_check) {
                    $rand = lcg_value();
                    $rate += $with->rate;
                    if ($rand < $rate) {
                        return true;
                    }
                } else {
                    return true;
                }
            }
        }
        return false;
    }
}