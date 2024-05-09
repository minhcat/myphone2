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
