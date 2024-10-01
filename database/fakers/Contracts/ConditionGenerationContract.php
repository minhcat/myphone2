<?php

namespace Database\Fakers\Contracts;

interface ConditionGenerationContract
{
    public function getConditionData();
    public function getFakerName();
}