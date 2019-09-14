<?php


namespace hp\oc\Observers;


use stdClass;

class CompositeObserver implements ObserverInterface
{
    /** @var ObserverInterface[] */
    public $observers;

    /** @var ObserverInterface */
    protected $next;

    public function __construct(ObserverInterface $next, ObserverInterface ...$observers)
    {
        $this->next = $next;
        $this->observers = $observers;
    }

    public function process($data): stdClass
    {
        $localData = clone $data;
        foreach ($this->observers as $observer) {
            $localData = $observer->process($localData);
        }
        $localData = $this->next->process($localData);
        return $localData;
    }
}