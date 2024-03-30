<?php

namespace App\Services\Modules\Observer;
use App\Interfaces\Modules\Observer\ObservableWithDataInterface;
use App\Interfaces\Modules\Observer\ObserverWithDataInterface;

class ObservableWithDataBase implements ObservableWithDataInterface
{
    private $observers = [];

    protected function notifyAll(array $data): void
    {
        foreach ($this->observers as $observer) {
            $observer->notify($data);
        }
    }

    public function addObserver(ObserverWithDataInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(ObserverWithDataInterface $observer): void
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }
}