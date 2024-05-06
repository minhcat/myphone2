<?php

use App\Enums\OrderStatus;
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

if (!function_exists('generate_label_orderstatus')) {
    function generate_label_orderstatus($status) {
        return '<span class="label label-'.OrderStatus::getLabel($status).'">'.OrderStatus::getName($status).'</span>';
    }
}

if (!function_exists('generate_button_orderstatus')) {
    function generate_button_orderstatus($status) {
        $btnname = '';
        switch ($status) {
            case OrderStatus::PENDING: $btnname = 'approve'; break;
            case OrderStatus::APPROVED: $btnname = 'ship'; break;
            case OrderStatus::SHIPPING: $btnname = 'complete'; break;
            case OrderStatus::COMPLETED: $btnname = 'delete'; break;
            case OrderStatus::CANCELLED: $btnname = 'delete'; break;
        }
        $label = OrderStatus::getLabel($status + 1);
        if ($status == OrderStatus::COMPLETED || $status == OrderStatus::CANCELLED) {
            $label = 'danger';
        }
        return '<button class="btn btn-'.$label.' w85">'.$btnname.'</button>';
    }
}
