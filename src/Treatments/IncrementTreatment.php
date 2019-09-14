<?php


namespace hp\oc\Treatments;


use stdClass;

class IncrementTreatment implements TreatmentInterface
{
    public function process($data): stdClass
    {
        $localData = clone $data;

        ++$localData->value;

        return $localData;
    }
}