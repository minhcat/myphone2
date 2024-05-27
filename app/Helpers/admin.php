<?php

use App\Enums\OrderStatus;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Modules\Order\Entities\Order;

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

if (!function_exists('generate_label')) {
    function generate_label($status, $class) {
        return '<span class="label label-'.$class::getLabel($status).'">'.$class::getName($status).'</span>';
    }
}

if (!function_exists('generate_button_orderstatus')) {
    function generate_button_orderstatus($status, $order_id = 0) {
        $btnname = '';
        $icon = '';
        $sts = '';
        switch ($status) {
            case OrderStatus::PENDING:
                $btnname = 'Approve';
                $icon = 'thumbs-up';
                $sts = '2';
                break;
            case OrderStatus::APPROVED:
                $btnname = 'Ship';
                $icon = 'truck';
                $sts = '3';
                break;
            case OrderStatus::SHIPPING:
                $btnname = 'Complete';
                $icon = 'check-circle';
                $sts = '4';
                break;
            case OrderStatus::COMPLETED:
                $btnname = 'Delete';
                break;
            case OrderStatus::CANCELLED:
                $btnname = 'Delete';
                break;
        }
        $label = OrderStatus::getLabel($status + 1);
        if ($status == OrderStatus::COMPLETED || $status == OrderStatus::CANCELLED) {
            return '<button class="btn btn-danger btn-delete w100" data-toggle="modal" data-target="#modal-order-delete" data-id="'.$order_id.'"><i class="fa fa-trash"></i> '.$btnname.'</button>';
        }
        return '<button class="btn btn-'.$label.' btn-update w100" data-toggle="modal" data-target="#modal-order-update" data-id="'.$order_id.'" data-status="'.$sts.'"><i class="fa fa-'.$icon.'"></i> '.$btnname.'</button> <button class="btn btn-default btn-update" data-toggle="modal" data-target="#modal-order-update" data-id="'.$order_id.'" data-status="5"><i class="fa fa-ban"></i> Cancel</button>';
    }
}

if (!function_exists('check_can_edit_by_orderid')) {
    function check_can_edit_by_orderid($order_id) {
        $status = optional(Order::find($order_id))->status;
        switch ($status) {
            case OrderStatus::APPROVED:
            case OrderStatus::SHIPPING:
            case OrderStatus::CANCELLED:
            case OrderStatus::COMPLETED:
                return false;
            case OrderStatus::PENDING:
                return true;
            default: 
                return false;
        }
    }
}

if (!function_exists('generate_code')) {
    function generate_code($model) {
        $code = rand(1000, 9999);
        while (!is_null($model->where('code', '#'.$code)->first())) {
            $code = rand(1000, 9999);
        }

        return $code;
    }
}

if (!function_exists('calc_quantity')) {
    function calc_quantity($that, $attributes) {
        $cart = $that->find($attributes['id']);
        $details = $cart->details;
        $quantity = 0;
        foreach ($details as $detail) {
            $quantity += $detail->quantity;
        }
        return $quantity;
    }
}

if (!function_exists('calc_total')) {
    function calc_total($that, $attributes) {
        $cart = $that->find($attributes['id']);
        $details = $cart->details;
        $total = 0;
        foreach ($details as $detail) {
            $total += $detail->quantity * $detail->price;
        }
        return $total;
    }
}

if (!function_exists('convert_stdtime')) {
    function convert_stdtime(string $datetime, string $format) {
        $array = date_parse_from_format($format, $datetime);
        if ($array['hour']) {
            return $array['hour'] . ':' . $array['minute'] . ':' . $array['second'] . ' ' . $array['year'] . '/' . $array['month'] . '/' . $array['day'];
        }
        return $array['year'] . '/' . $array['month'] . '/' . $array['day'];
    }
}
