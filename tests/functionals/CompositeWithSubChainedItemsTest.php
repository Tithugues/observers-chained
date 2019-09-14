<?php


use hp\oc\Observers\CompositeObserver;
use hp\oc\Observers\NullObserver;
use hp\oc\Observers\TreatmentObserver;
use hp\oc\Treatments\DoubleTreatment;
use hp\oc\Treatments\IncrementTreatment;
use PHPUnit\Framework\TestCase;

class CompositeWithSubChainedItemsTest extends TestCase
{
    public function testSubChainedItems()
    {
        $data = new stdClass();
        $data->value = 1;

        $doubleTreatment = new DoubleTreatment();
        $incrementTreatment = new IncrementTreatment();
        $nullObserver = new NullObserver();

        $doublingAndStopObserver = new TreatmentObserver($nullObserver, $doubleTreatment);
        $incrementingObserver = new TreatmentObserver($doublingAndStopObserver, $incrementTreatment);
        $incrementingAndStopObserver = new TreatmentObserver($nullObserver, $incrementTreatment);

        $compositeObserver = new CompositeObserver(
            $doublingAndStopObserver,
            $incrementingObserver,
            $incrementingAndStopObserver
        );

        $dataReturned = $compositeObserver->process($data);

        $this->assertEquals(10, $dataReturned->value);
    }
}
