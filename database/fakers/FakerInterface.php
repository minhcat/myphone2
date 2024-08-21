<?php

namespace Database\Fakers;

interface FakerInterface
{
    public function __get($attribute);
}