<?php
declare(strict_types=1);

namespace hp\oc\Treatments;


use stdClass;

interface TreatmentInterface
{
    public function process($data): stdClass;
}