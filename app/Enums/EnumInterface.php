<?php

namespace App\Enums;

interface EnumInterface
{
    public static function getName($value);

    public static function getLabel($value);

    public static function getList(): array;

    public static function getObject($list);
}