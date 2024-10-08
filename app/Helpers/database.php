<?php

use App\Enums\FixType;
use Faker\Provider\Lorem;
use Modules\Product\Repositories\ProductRepository;
use Modules\Specification\Repositories\InformationRepository;

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
if (!function_exists('get_time_of_use_session')) {
    function get_time_of_use_session($faker, $attribute, $value) {
        $time_of_use = 0;
        $val = $value->value === null || $value->value === '' ? 'none' : $value->value;
        $val = $value->id === null ? $val : $value->id;
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
        $val = $fixvalue->id === null ? $val : $fixvalue->id;
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

if (!function_exists('get_time_of_loop_session')) {
    function get_time_of_loop_session($faker, $attribute) {
        $time_of_loop = 0;
        $session_name = $faker->faker_name . '.' . $attribute->name . '.loop';
        if (session()->has($session_name)) {
            $time_of_loop = session($session_name);
        }

        return [$time_of_loop, $session_name];
    }
}

if (!function_exists('get_attribute_session')) {
    function get_attribute_session($faker, $attribute) {
        return $faker->faker_name . '.' . $attribute->name;
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

            if (isset($data_compress['conditions_compress'])) {
                $conditions = $data_compress['conditions_compress'][$i];
            } else {
                $conditions = optional($data_compress)['conditions'];
            }

            $data_uncompress[] = [
                'value'         => $value,
                'rate'          => $rate,
                'max'           => $max,
                'conditions'    => $conditions
            ];
        }

        return $data_uncompress;
    }
}

if (!function_exists('uncompress_conditions')) {
    function uncompress_conditions($data, $length = null) {
        $result = [];
        foreach ($data as $data_condition) {
            $data_compress = $data_condition;
            $data_uncompress = [];
            if ($length === null && isset($data_compress['length'])) {
                $length = $data_compress['length'];
            } elseif ($length === null) {
                $min = INF;
                foreach ($data_compress as $item) {
                    if (is_array($item) && count($item) < $min) {
                        $min = count($item);
                    }
                }
                $length = $min;
            }

            for ($i = 0; $i < $length; $i++) {
                if (is_array($data_compress['attribute'])) {
                    $attribute = $data_compress['attribute'][$i];
                } else {
                    $attribute = $data_compress['attribute'];
                }
    
                if (is_array($data_compress['value'])) {
                    $value = $data_compress['value'][$i];
                } else {
                    $value = $data_compress['value'];
                }
    
                if (isset($result[$i])) {
                    $result[$i] = [];
                }
                $result[$i][] = [
                    'attribute'     => $attribute,
                    'value'         => $value,
                ];
            }
        }

        return $result;
    }
}

if (!function_exists('handle_loop_attribute_session')) {
    function handle_loop_attribute_session($loop_max, $faker, $attribute) {
        [$loop_time, $loop_session_name] = get_time_of_loop_session($faker, $attribute);
        if ($loop_time >= $loop_max) {
            $session_name = get_attribute_session($faker, $attribute);
            $loop_time = 0;
            session()->forget($session_name);
        }
        session()->put($loop_session_name, $loop_time + 1);
    }
}

if (!function_exists('array_get')) {
    function array_get(string $string, array $array, $default = null) {
        try {
            if (strpos($string, '.')) {
                $keys = explode('.', $string);
                $result = $array;
                foreach ($keys as $key) {
                    $result = $result[$key];
                }
                return $result;
            }
            return $array[$string];
        } catch (Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('update_seeder')) {
    function update_seeder(array $data, array $option = []) {
        foreach ($data as $key => $item) {
            if (array_search('timestamp', $option) !== false || array_search('created_at', $option) !== false) {
                $data[$key]['created_at'] = now()->format('Y-m-d H:i:s');
            }
            if (array_search('timestamp', $option) !== false || array_search('updated_at', $option) !== false) {
                $data[$key]['updated_at'] = now()->format('Y-m-d H:i:s');
            }
            if (array_search('description', $option) !== false) {
                $data[$key]['description'] = Lorem::paragraph(4);
            }
            if (array_search('note', $option) !== false) {
                $data[$key]['note'] = Lorem::paragraph(1);
            }
        }
        return $data;
    }
}

if (!function_exists('count_lightweight_product')) {
    function count_lightweight_product() {
        $count = 0;
        $productRepository = new ProductRepository();
        $informationRepository = new InformationRepository();
        $products = $productRepository->all();
        $informations = $informationRepository->getWhereIn('value', ['100 g', '150 g', '200 g', '220 g', '1.7 kg']);
        $information_ids = $informations->pluck('id')->toArray();

        foreach ($products as $product) {
            foreach ($product->details as $detail) {
                if (array_search($detail->information->id, $information_ids) !== false) {
                    $count ++;
                }
            }
        }

        return $count;
    }
}

if (!function_exists('count_available_product')) {
    function count_available_product() {
        return 650 + count_lightweight_product();
    }
}

if (!function_exists('array_multiply')) {
    function array_multiply(array $array, $times = 2) {
        for ($i = 2; $i <= $times; $i++) {
            foreach ($array as $item) {
                $array[] = $item;
            }
        }
        return $array;
    }
}

if (!function_exists('add_id_to_objects')) {
    function add_id_to_objects(array $array) {
        foreach ($array as $key => $item) {
            $array[$key]['id'] = $key;
        }

        return $array;
    }
}