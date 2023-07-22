<?php

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

if (!function_exists('flatten')) {
    function flatten(array $array) {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }
}

if (!function_exists('get_messages')) {
    function get_messages($errors) {
        if (!is_null($errors) && $errors instanceof ViewErrorBag) {
            $bags = $errors->getBags();
            $default = $bags['default'] ?? [];
            if ($default instanceof MessageBag) {
                return flatten($default->getMessages());
            }
            return ['Has error is in system'];
        }
        return ['Has error is in system'];
    }
}
