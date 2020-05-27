<?php
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();


function deliveryTime()
{
    if (isset($_POST["expressOrder"])) {
        echo("Expected express delivery time is " . date('h:i:s A', strtotime('+ 45 minutes')));
    } else {
        echo("Expected delivery time is around " . date('h:i:s A', strtotime('+ 45 minutes')));
    }
}



function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

require 'form-view.php';
