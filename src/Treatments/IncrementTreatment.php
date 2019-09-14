<?php


namespace hp\oc\Treatments;


use stdClass;

class DoubleTreatment implements TreatmentInterface
{
    public function process($data): stdClass
    {
        $localData = clone $data;

        $localData->value *= 2;

        return $localData;
    }
}