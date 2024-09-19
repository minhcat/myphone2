<?php

namespace Database\Fakers;

use Illuminate\Database\Eloquent\Model;
use Modules\Attribute\Repositories\AttributeRepository;
use Modules\Product\Repositories\VariationRepository;

class OptionVariationFaker extends AbstractFaker
{
    protected $attributeRepository;
    protected $variationRepository;

    public function __construct()
    {
        $this->attributeRepository = new AttributeRepository;
        $this->variationRepository = new VariationRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/option_variation/option_variation.php';
    }

    public function generate()
    {
        // generate variation id
        $variation_ids_choose = [];
        $session_data = session()->get('option_variation.variation_id', []);
        $max = 3;
        foreach ($session_data as $key => $item) {
            if ($item['time'] >= $max) {
                $variation_ids_choose[] = $key;
            }
        }
        $variation = $this->variationRepository->findWhereNotIn('id', $variation_ids_choose);
        $this->variation_id = $variation->id;
        $time = session()->get('option_variation.variation_id.'.$variation->id.'.time', 0);
        session()->put('option_variation.variation_id.'.$variation->id.'.time', $time + 1);

        // generate option id
        $attributes = $this->attributeRepository->all();
        foreach ($attributes as $attribute) {
            $check_attribute_session_name = $this->getCheckAttributeSessionName($variation, $attribute);
            $check_attribute = session()->get($check_attribute_session_name, true);
            if ($check_attribute) {
                foreach ($attribute->options as $option) {
                    if ($this->checkOptionId($variation, $attributes, $attribute, $option)) {
                        $this->option_id = $option->id;
                        $this->saveSelectedOptionIdsSesssion($variation, $attribute, $option->id);
                        break 2;
                    }
                }
            }
        }
    }

    private function getCheckAttributeSessionName($variation, $attribute)
    {
        return 'option_variation.check_attribute.'.$variation->id.'.'.$attribute->id;
    }

    private function getSelectedOptionIdSessionName($variation)
    {
        return 'option_variation.option_select.'.$variation->product_id;
    }

    private function getSelectedOptionIdByVariationIdSessionName($variation)
    {
        return 'option_variation.option_select.'.$variation->product_id.'.'.$variation->id;
    }

    private function checkOptionId($variation, $attributes, $check_attribute, $check_option, $option_ids = null)
    {
        $session_name1 = $this->getSelectedOptionIdSessionName($variation);
        $session_name2 = $this->getSelectedOptionIdByVariationIdSessionName($variation);
        $session_data1 = session()->get($session_name1, []);
        $session_data2 = session()->get($session_name2, []);

        $session_data2 = $option_ids !== null ? $option_ids : $session_data2;
        $session_data2[] = $check_option->id;
        if (count($session_data2) === 3) {
            return !in_array($session_data2, $session_data1);
        }

        $allow_check = false;
        foreach ($attributes as $attribute) {
            if ($attribute->is($check_attribute)) {
                $allow_check = true;
                continue;
            }

            if ($allow_check) {
                $option_ids_temp = $session_data2;
                foreach ($attribute->options as $option) {
                    if (count($option_ids_temp) < 3) {
                        $check = $this->checkOptionId($variation, $attributes, $attribute, $option, $option_ids_temp);
                        if ($check) {
                            return true;
                        }
                    } else {
                        $option_ids_temp[] = $option->id;
                        return !in_array($option_ids_temp, $session_data1);
                    }
                }
            }
        }
    }

    private function saveSelectedOptionIdsSesssion($variation, $attribute, $option_id)
    {
        $session_name1 = $this->getCheckAttributeSessionName($variation, $attribute);
        $session_name3 = $this->getSelectedOptionIdByVariationIdSessionName($variation);

        $selected_by_variation_id_option_ids = session()->get($session_name3, []);
        $selected_by_variation_id_option_ids[] = $option_id;

        session()->put($session_name1, false);
        session()->put($session_name3, $selected_by_variation_id_option_ids);
    }
}