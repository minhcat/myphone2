<?php

namespace Database\Fakers\Traits;

use App\Enums\FakerConditionType;

trait CheckConditions
{
    public function hasConditions()
    {
        if (count($this->conditions) > 0) {
            return true;
        }
        return false;
    }

    public function checkConditions($attributes)
    {
        $check = true;
        foreach ($this->conditions as $condition) {
            foreach ($attributes as $attr) {
                if ($condition->attribute === $attr->name) {
                    if ($condition->type == FakerConditionType::EQUAL) {
                        if (is_array($condition->value)) {
                            foreach ($condition->value as $cvalue) {
                                if ($cvalue !== $attr->value) {
                                    $check = false;
                                    break 3;
                                }
                            }
                        } else if ($condition->value !== $attr->value) {
                            $check = false;
                            break 2;
                        }
                    } elseif ($condition->type == FakerConditionType::NOT_EQUAL) {
                        if (is_array($condition->value)) {
                            foreach ($condition->value as $cvalue) {
                                if ($cvalue === $attr->value) {
                                    $check = false;
                                    break 3;
                                }
                            }
                        } else if ($condition->value === $attr->value) {
                            $check = false;
                            break 2;
                        }
                    }
                }
            }
        }
        return $check;
    }
}