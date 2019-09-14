<?php


use hp\oc\Observers\NullObserver;
use hp\oc\Observers\TreatmentObserver;
use hp\oc\Treatments\DoubleTreatment;
use PHPUnit\Framework\TestCase;

class TwoTreatmentObserverTest extends TestCase
{
    public function testTreatmentObserver()
    {
        $data = new stdClass();
        $data->value = 1;

        $doubleTreatment = new DoubleTreatment();
        $nullObserver = new NullObserver();
        $observer1 = new TreatmentObserver($nullObserver, $doubleTreatment);
        $observer2 = new TreatmentObserver($observer1, $doubleTreatment);
        $dataReturned = $observer2->process($data);

        $this->assertEquals(4, $dataReturned->value);
    }
}
