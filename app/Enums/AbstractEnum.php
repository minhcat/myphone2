<?php

namespace App\Enums;

abstract class AbstractEnum implements EnumInterface
{
    public static function getObject($list = null)
    {
        if ($list === null) {
            $list = self::getList();
        }
        $objects = [];

        foreach ($list as $item) {
            $objects[] = (object) [
                'code'  => $item,
                'name'  => self::getName($item),
                'label' => self::getLabel($item)
            ];
        }

        return $objects;
    }
}