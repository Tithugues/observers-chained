<?php

namespace hp\oc\tests\Observers\units;

use hp\oc\Observers\NullObserver;
use PHPUnit\Framework\TestCase;
use stdClass;

class NullObserverTest extends TestCase
{

    public function testProcess()
    {
        $data = new StdClass();

        $observer = new NullObserver();
        $dataReturned = $observer->process($data);

        $this->assertEquals($data, $dataReturned);
    }
}
