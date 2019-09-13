<?php
declare(strict_types=1);

namespace hp\oc\Observers;


use stdClass;

interface ObserverInterface
{
    public function process($data): stdClass;
}
