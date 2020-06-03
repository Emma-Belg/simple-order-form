<?php

namespace Controller;

use Model\DeliveryTime;
include_once 'Model/DeliveryTime.php';

class DeliveryTimeController
{

    public function render()
    {
        $deliveryTime = new DeliveryTime();
        //$deliveryTimes = $deliveryTime->deliveryTime();
        $deliveryArray = [
            'deliveryTimeMessage' => $deliveryTime->deliveryTime(),
        ];
        require_once 'View/form-view.php';
        //return $deliveryArray;
    }
}