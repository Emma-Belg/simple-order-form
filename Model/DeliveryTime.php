<?php

namespace Model;


class DeliveryTime
{
    function deliveryTime()
    {
        if (isset($_POST["expressOrder"])) {
            $echo = ("Expected express delivery time is " . date('h:i:s A', strtotime('+ 45 minutes')));
        } else {
            $echo = ("Expected delivery time is around " . date('h:i:s A', strtotime('+ 45 minutes')));
        }
        //echo $echo;
        return $echo;
    }
}