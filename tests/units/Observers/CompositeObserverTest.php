<?php

namespace hp\oc\tests\Observers\units;

use hp\oc\Observers\CompositeObserver;
use hp\oc\Observers\NullObserver;
use hp\oc\Observers\ObserverInterface;
use hp\oc\Observers\TreatmentObserver;
use hp\oc\TreatmentInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use stdClass;

class CompositeObserverTest extends TestCase
{

    public function testProcess()
    {
        $data = new StdClass();

        /** @var ObserverInterface|MockObject $observer1 */
        $observer1 = $this->getMockBuilder(ObserverInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $observer1->expects($this->once())
            ->method('process')
            ->with();

        /** @var ObserverInterface|MockObject $observer2 */
        $observer2 = $this->getMockBuilder(ObserverInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $observer2->expects($this->once())
            ->method('process')
            ->with();

        /** @var ObserverInterface|MockObject $next */
        $next = $this->getMockBuilder(ObserverInterface::class)
            ->setMethods(['process'])
            ->getMock();

        $next->expects($this->once())
            ->method('process')
            ->with();

        $observer = new CompositeObserver($next, $observer1, $observer2);
        $observer->process($data);
    }
}
