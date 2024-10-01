<?php

namespace Database\Fakers\Traits;

trait ConditionGeneration
{
    public function conditionGenerate()
    {
        $resourceRepository1 = $this->getResourceRepository1();
        $resourceRepository2 = $this->getResourceRepository2();
        $data = $this->getConditionData();
        $resources1 = $resourceRepository1->all();

        foreach ($resources1 as $resource1) {
            foreach ($data as $resouce2_name => $resource2_data) {
                if (!$this->checkExist($resouce2_name, $resource1, $resourceRepository2)) {
                    continue;
                }

                if (!$this->checkCondition('has', $resource2_data, $resource1)) {
                    continue;
                }

                if (!$this->checkCondition('not', $resource2_data, $resource1)) {
                    continue;
                }
    
                $this->generateData($resouce2_name, $resource1, $resourceRepository2);
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

    private function checkExist($cate_name, $resource1, $resourceRepository2)
    {
        $resource_id2 = $resourceRepository2->first([['name', $cate_name]])->id;
        $session_name = $this->getFakerName().'.check_exist.'.$resource1->id.'.'.$resource_id2;
        return session()->get($session_name, true);
    }

    private function generateData($cate_name, $resource, $resourceRepository2) {
        $resouce_id2 = $resourceRepository2->first([['name', $cate_name]])->id;
        $session_name = $this->getFakerName().'.check_exist.'.$resource->id.'.'.$resouce_id2;
        $attribute_name1 = $this->getAttributeName1();
        $attribute_name2 = $this->getAttributeName2();
        $this->$attribute_name1 = $resource->id;
        $this->$attribute_name2 = $resouce_id2;
        session()->put($session_name, false);
    }
}