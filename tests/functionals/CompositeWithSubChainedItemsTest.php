<?php


use hp\oc\Observers\CompositeObserver;
use hp\oc\Observers\NullObserver;
use hp\oc\Observers\TreatmentObserver;
use hp\oc\Treatments\DoubleTreatment;
use hp\oc\Treatments\IncrementTreatment;
use PHPUnit\Framework\TestCase;

class ThreeTreatmentObserverTest extends TestCase
{
    public function testTreatmentObserver()
    {
        $data = new stdClass();
        $data->value = 1;

        $doubleTreatment = new DoubleTreatment();
        $incrementTreatment = new IncrementTreatment();
        $nullObserver = new NullObserver();

        $compositeObservers = [];
        $compositeObservers[] = new TreatmentObserver($nullObserver, $doubleTreatment);
        $compositeObservers[] = new TreatmentObserver($nullObserver, $incrementTreatment);

        $observerNextComposite = new TreatmentObserver($nullObserver, $incrementTreatment);

        $observer3 = new CompositeObserver($observerNextComposite, ...$compositeObservers);

        $dataReturned = $observer3->process($data);

        $this->assertEquals(4, $dataReturned->value);
    }
}
