<?php


namespace hp\oc\Observers;


use stdClass;

class CompositeObserver implements ObserverInterface
{
    /** @var ObserverInterface[] */
    public $observers;

    public function __construct(ObserverInterface ...$observers)
    {
        $this->observers = $observers;
    }

    public function process($data): stdClass
    {
        $localData = clone $data;
        foreach ($this->observers as $observer) {
            $localData = $observer->process($localData);
        }
        return $localData;
    }
}