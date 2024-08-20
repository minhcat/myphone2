<?php

namespace App\Faker\Traits;

trait CheckWiths
{
    public function hasWiths()
    {
        if (count($this->withs) > 0) {
            return true;
        }
        return false;
    }

    public function checkWiths($value)
    {
        $rate = 0;
        foreach ($this->withs as $with) {
            if ($with->value === $value) {
                $rand = lcg_value();
                $rate += $with->rate;
                if ($rand < $rate) {
                    return true;
                }
            }
        }
        return false;
    }
}