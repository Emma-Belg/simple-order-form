<?php

namespace Controller;

use Model\DeliveryTime;

class DeliveryTimeController
{

    public function render()
    {
        $deliveryTime = new DeliveryTime();
        $deliveryTimes = $deliveryTime->deliveryTime();
        require 'View/form-view.php';
        return $deliveryTimes;
    }
}