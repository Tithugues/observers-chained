<?php


use hp\oc\Observers\NullObserver;
use hp\oc\Observers\TreatmentObserver;
use hp\oc\Treatments\DoubleTreatment;
use PHPUnit\Framework\TestCase;

class OneTreatmentObserverTest extends TestCase
{
    public function testTreatmentObserver()
    {
        $data = new stdClass();
        $data->value = 1;

        $doubleTreatment = new DoubleTreatment();
        $nullObserver = new NullObserver();
        $observer = new TreatmentObserver($doubleTreatment, $nullObserver);
        $dataReturned = $observer->process($data);

        $this->assertEquals(2, $dataReturned->value);
    }
}
