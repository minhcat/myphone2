<?php

namespace App\Enums;

abstract class AbstractEnum implements EnumInterface
{
    public static function getObject($list = null)
    {
        if ($list === null) {
            $list = static::getList();
        }
        $objects = [];

        foreach ($list as $item) {
            $objects[] = (object) [
                'code'  => $item,
                'name'  => static::getName($item),
                'label' => static::getLabel($item)
            ];
        }

        return $objects;
    }
}