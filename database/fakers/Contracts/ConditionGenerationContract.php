<?php

namespace Database\Fakers\Contracts;

interface ConditionGenerationContract
{
    public function getConditionData();
    public function getFakerName();
    public function getResourceRepository1();
    public function getResourceRepository2();
    public function getAttributeName1();
    public function getAttributeName2();
}