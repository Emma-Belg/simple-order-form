<?php
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

$email = "";

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isRequired($data)
{
    if (empty($_POST[$data])) {
        echo("<div class=\"alert alert-danger\">This field is required!</div>");
    }
}

$dataCorrect = false;

function email()
{
    if (isset($_POST["email"])) {
        $email = check_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $emailErr = "<div class=\"alert alert-danger\">invalid email format</div>";
        } else {
            $GLOBALS["dataCorrect"] = true;
            echo $thankYou = "<div class=\"alert alert-success\">Thank you</div>";
        }
    }
}

function numberOnly($data)
{
    $number = $_POST[$data];

    if (isset($number)) {
        if (is_numeric($number)) {
            $GLOBALS["dataCorrect"] = true;
            echo "<div class=\"alert alert - success\">Thank you</div>";
        } else {
            echo "<div class=\"alert alert-danger\">Please enter only numbers.</div>";
        }
    }
}

function sessionData($data){
    if($GLOBALS["dataCorrect"] == true){
        $_SESSION[$data] = $_POST[$data];
        echo $_SESSION[$data];
    } else {
        $_SESSION[$data] = "";
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

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'form-view.php';
