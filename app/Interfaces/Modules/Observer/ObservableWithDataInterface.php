<?php 

namespace App\Interfaces\Modules\Observer;

interface ObservableWithDataInterface
{
    public function notifyAll(array $data): void;
    public function addObserver(ObserverWithDataInterface $observer): void;
    public function removeObserver(ObserverWithDataInterface $observer): void;
}