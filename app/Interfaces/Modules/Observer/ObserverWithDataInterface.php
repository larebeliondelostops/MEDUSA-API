<?php

namespace App\Interfaces\Modules\Observer;

interface ObserverWithDataInterface
{
    public function notify(array $data) : void;
}