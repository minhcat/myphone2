<?php

namespace Database\Fakers\Traits;

trait ConditionGeneration
{
    public function conditionGenerate($resourceRepository, $resourceRepository2)
    {
        $data = $this->getConditionData();
        $resources = $resourceRepository->all();

        foreach ($resources as $resource) {
            foreach ($data as $resouce2_name => $resource2_data) {
                if (!$this->checkExist($resouce2_name, $resource, $resourceRepository2)) {
                    continue;
                }

                if (!$this->checkCondition('has', $resource2_data, $resource)) {
                    continue;
                }

                if (!$this->checkCondition('not', $resource2_data, $resource)) {
                    continue;
                }
    
                $this->generateData($resouce2_name, $resource);
                break 2;
            }
        }
    }

    private function checkCondition($type, $cate, $resource) {
        $data = array_get($type, $cate, []);
        $check = false;
        foreach ($data as $names) {
            $check = false;
            foreach ($names as $name) {
                if (is_array($name)) {
                    foreach ($name as $_name) {
                        $check = false;
                        if (is_array($_name)) {
                            foreach ($_name as $__name) {
                                if (strpos($resource->name, $__name) !== false) {
                                    $check = true;
                                    break 3;
                                }
                            }
                        } elseif (strpos($resource->name, $_name) !== false) {
                            $check = true;
                            continue;
                        }
                        if (!$check) {
                            break;
                        }
                    }
                    if ($check) {
                        break;
                    }
                } elseif (strpos($resource->name, $name) !== false) {
                    $check = true;
                    break;
                }
            }
            if (!$check) {
                break;
            }
        }

        return $type === 'not' ? !$check : $check;
    }

    private function checkExist($cate_name, $resource, $resourceRepository2)
    {
        $resource2_id = $resourceRepository2->first([['name', $cate_name]])->id;
        $session_name = $this->getFakerName().'.check_exist.'.$resource->id.'.'.$resource2_id;
        return session()->get($session_name, true);
    }

    private function generateData($cate_name, $product) {
        $category_id = $this->categoryRepository->first([['name', $cate_name]])->id;
        $session_name = $this->getFakerName().'.check_exist.'.$product->id.'.'.$category_id;
        $this->product_id = $product->id;
        $this->category_id = $category_id;
        session()->put($session_name, false);
    }
}