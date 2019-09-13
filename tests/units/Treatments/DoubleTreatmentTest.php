<?php

namespace hp\oc\tests\Treatments;

use hp\oc\Treatments\DoubleTreatment;
use PHPUnit\Framework\TestCase;

class DoubleTreatmentTest extends TestCase
{
    public function testProcess()
    {
        $data = new \stdClass();
        $data->value = 1;

        $dataResult = (new DoubleTreatment())->process($data);

        $this->assertEquals(2, $dataResult->value);
        $this->assertEquals(1, $data->value);
    }
}
