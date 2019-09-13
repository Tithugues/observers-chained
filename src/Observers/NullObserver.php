<?php
declare(strict_types=1);


namespace hp\oc\Observers;


use hp\oc\TreatmentInterface;
use stdClass;

class NullObserver implements ObserverInterface
{
    public function process($data): stdClass
    {
        return $data;
    }
}