<?php
declare(strict_types=1);


namespace hp\oc\Observers;


use hp\oc\Treatments\TreatmentInterface;
use stdClass;

class TreatmentObserver implements ObserverInterface
{
    /** @var TreatmentInterface */
    protected $treatment;

    /** @var ObserverInterface */
    protected $next;

    public function __construct(TreatmentInterface $treatment, ObserverInterface $next)
    {
        $this->treatment = $treatment;
        $this->next = $next;
    }

    public function process($data): stdClass
    {
        $localData = $this->treatment->process($data);
        $localData = $this->next->process($localData);
        return $localData;
    }
}