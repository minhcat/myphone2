<?php

use App\Enums\FixType;
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

if (!function_exists('generate_button_update_status')) {
    function generate_button_update_status($status, $class, $data = []) {
        $nextStatus = $class::getNextStatus($status);
        $icon = $class::getIcon($status);
        $label = $class::getActionLabel($status);
        $action = $class::getAction($status);
        $dataAttr = '';
        foreach ($data as $name => $value) {
            $dataAttr .= 'data-'.$name.'="'.$value.'" ';
        }
        if ($nextStatus !== null) {
            return '<button class="btn btn-'.$label.' btn-update w108" '.$dataAttr.'><i class="'.$icon.'"></i> '.$action.'</button>';
        }
        return '';
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

if (!function_exists('generate_seeder_data')) {
    function generate_seeder_data(array $array, $option = null) {
        $length = [];
        foreach ($array as $field => $values) {
            if (is_array($values)) {
                $length[] = count($values);
            }
        }
        $length = min($length);

        $data = [];
        foreach ($array as $field => $values) {
            if (is_array($values)) {
                for ($i = 0; $i < $length; $i++) {
                    if (!isset($data[$i])) {
                        $data[$i] = [];
                    }
                    $data[$i][$field] = $values[$i];
                }
            } else {
                for ($i = 0; $i < $length; $i++) {
                    if (!isset($data[$i])) {
                        $data[$i] = [];
                    }
                    $data[$i][$field] = $values;
                }
            }
        }

        if ($option === null || $option?->timestemps === true) {
            for ($i = 0; $i < $length; $i++) {
                if (!isset($data[$i])) {
                    $data[$i] = [];
                }
                $data[$i]['created_at'] = now()->format('Y-m-d H:i:s');
                $data[$i]['updated_at'] = now()->format('Y-m-d H:i:s');
            }
        }

        return $data;
    }
}

if (!function_exists('convert_vn2latin')) {
    function convert_vn2latin($string) {
        $vn_unicode_chars  = [
            "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ",
            "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
            "ì","í","ị","ỉ","ĩ",
            "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ờ","ớ","ợ","ở","ỡ",
            "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
            "ỳ","ý","ỵ","ỷ","ỹ",
            "đ",
            "Á","À","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ẳ","Ẵ","Ặ","Ẳ","Ẵ",
            "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
            "Ì","Í","Ị","Ỉ","Ĩ",
            "Ó","Ò","Ọ","Ỏ","Õ","Ô","Ố","Ồ","Ộ","Ổ","Ỗ","Ơ" ,"Ớ","Ờ","Ợ","Ở","Ỡ",
            "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
            "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
            "Đ"
        ];

        $latin_unicode_chars = [
            "a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a",
            "e","e","e","e","e","e","e","e","e","e","e",
            "i","i","i","i","i",
            "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o",
            "u","u","u","u","u","u","u","u","u","u","u",
            "y","y","y","y","y",
            "d",
            "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A",
            "E","E","E","E","E","E","E","E","E","E","E",
            "I","I","I","I","I",
            "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O",
            "U","U","U","U","U","U","U","U","U","U","U",
            "Y","Y","Y","Y","Y",
            "D"
        ];

        return str_replace($vn_unicode_chars, $latin_unicode_chars, $string);
    }
}

if (!function_exists('get_time_of_use_session')) {
    function get_time_of_use_session($faker, $attribute, $value) {
        $time_of_use = 0;
        $val = $value->value === null || $value->value === '' ? 'none' : $value->value;
        $session_name = $faker->faker_name . '.' . $attribute->name . '.' . $val . '.time';
        if (session()->has($session_name)) {
            $time_of_use = session($session_name);
        }

        return [$time_of_use, $session_name];
    }
}

if (!function_exists('get_time_of_use_fix_session')) {
    function get_time_of_use_fix_session($faker, $attribute, $fixvalue, $fixtype) {
        $val = $fixvalue->value === null || $fixvalue->value === '' ? 'none' : $fixvalue->value;
        $org = $attribute->origin === null || $attribute->origin === '' ? 'none' : $attribute->origin;
        $val = str_replace(' ', '-', $val);
        $org = str_replace(' ', '-', $org);
        if ($fixtype == FixType::PREFIX) {
            $prefix_str = '';
            foreach ($attribute->prefixes_selected as $prefix) {
                $prefix = $prefix == '' ? 'none' : $prefix;
                $prefix_str .= 'prefix.' . $prefix;
            }
            $prefix_str = $prefix_str !== '' ? '.'.$prefix_str : $prefix_str;
            $session_name = $faker->faker_name . '.' . $attribute->name . '.' . $org . $prefix_str . '.prefix.' . $val . '.time';
        } else {
            $suffix_str = '';
            foreach ($attribute->suffixes_selected as $suffix) {
                $suffix = $suffix == '' ? 'none' : $suffix;
                $suffix_str .= 'suffix.' . $suffix;
            }
            $suffix_str = $suffix_str !== '' ? '.'.$suffix_str : $suffix_str;
            $session_name = $faker->faker_name . '.' . $attribute->name . '.' . $org . $suffix_str . '.suffix.' . $val . '.time';
        }

        $time_of_use = 0;
        if (session()->has($session_name)) {
            $time_of_use = session($session_name);
        }

        return [$time_of_use, $session_name];
    }
}

if (!function_exists('array_flatten')) {
    function array_flatten(array $array) {
        $result = [];
        foreach ($array as $list) {
            foreach ($list as $item) {
                $result[] = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('require_list')) {
    function require_list($paths = []) {
        $result = [];
        foreach ($paths as $path) {
            $list = require $path;
            $result[] = $list;
        }
        return array_flatten($result);
    }
}

if (!function_exists('uncompress')) {
    function uncompress($data, $length = null) {
        $data_compress = $data;
        $data_uncompress = [];
        if ($length === null && isset($data_compress['length'])) {
            $length = $data_compress['length'];
        } elseif ($length === null) {
            $min = INF;
            foreach ($data_compress as $key => $item) {
                if (is_array($item) && $key !== 'conditions' && count($item) < $min) {
                    $min = count($item);
                }
            }
            $length = $min;
        }

        for ($i = 0; $i < $length; $i++) {
            if (is_array($data_compress['value'])) {
                $value = $data_compress['value'][$i];
            } else {
                $value = $data_compress['value'];
            }

            if (is_array($data_compress['rate'])) {
                $rate = $data_compress['rate'][$i];
            } else {
                $rate = $data_compress['rate'];
            }

            if (isset($data_compress['max']) && is_array($data_compress['max'])) {
                $max = $data_compress['max'][$i];
            } elseif (isset($data_compress['max'])) {
                $max = $data_compress['max'];
            } else {
                $max = 1000;
            }
            $data_uncompress[] = [
                'value'         => $value,
                'rate'          => $rate,
                'max'           => $max,
                'conditions'    => optional($data_compress)['conditions']
            ];
        }

        return $data_uncompress;
    }
}
