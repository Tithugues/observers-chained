<?php

namespace hp\oc\tests\Observers\units;

use hp\oc\Observers\ObserverInterface;
use hp\oc\Observers\TreatmentObserver;
use hp\oc\Treatments\TreatmentInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use stdClass;

class TreatmentObserverTest extends TestCase
{
    public function testProcess()
    {
        $data = new StdClass();

        /** @var TreatmentInterface|MockObject $treatment */
        $treatment = $this->getMockBuilder(TreatmentInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $treatment->expects($this->once())
            ->method('process')
            ->with();

        /** @var ObserverInterface|MockObject $next */
        $next = $this->getMockBuilder(ObserverInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $next->expects($this->once())
            ->method('process')
            ->with();

        $observer = new TreatmentObserver($next, $treatment);
        $observer->process($data);
    }

    public function testProcessWithNextAlteringData()
    {
        $data = new StdClass();

        /** @var TreatmentInterface|MockObject $treatment */
        $treatment = $this->getMockBuilder(TreatmentInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $treatment->expects($this->once())
            ->method('process')
            ->with();

        /** @var ObserverInterface|MockObject $next */
        $next = $this->getMockBuilder(ObserverInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $nextReturn = new StdClass();
        $nextReturn->value = 1;
        $next->expects($this->once())
            ->method('process')
            ->with()
            ->willReturn($nextReturn);

        $observer = new TreatmentObserver($next, $treatment);
        $observerReturn = $observer->process($data);

        $this->assertEquals($nextReturn, $observerReturn);
    }
}
