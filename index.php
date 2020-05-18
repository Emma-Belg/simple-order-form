<?php
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();

$email = "";
$dataCorrect = false;
$correctCount = 0;

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

function email()
{
    if (isset($_POST["email"])) {
        $email = check_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $emailErr = "<div class=\"alert alert-danger\">invalid email format</div>";
        } else {
            $GLOBALS["dataCorrect"] = true;
            $GLOBALS["correctCount"]++;
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
            $GLOBALS["correctCount"]++;
            echo "<div class=\"alert alert-success\">Thank you</div>";
        } else {
            $GLOBALS["dataCorrect"] = false;
            echo "<div class=\"alert alert-danger\">Please enter only numbers.</div>";
        }
    }
}

function lettersOnly($data)
{
    //if(!preg_match('/[^A-Za-z0-9]/', $_POST[$data]))
    //could also be done with this:
    if (ctype_alnum($_POST[$data])) {
        $GLOBALS["dataCorrect"] = true;
        $GLOBALS["correctCount"]++;
        echo "<div class=\"alert alert-success\">Thank you</div>";
    } else {
        $GLOBALS["dataCorrect"] = false;
        echo "<div class=\"alert alert-danger\">Please enter only letters.</div>";
    }
}

function sessionData($data)
{
    if ($GLOBALS["dataCorrect"] == true) {
        $_SESSION[$data] = $_POST[$data];
        echo $_SESSION[$data];
    } else {
        $_SESSION[$data] = "";
    }
}

function sentMessage()
{
    if ($GLOBALS["correctCount"] == 5) {
        echo("<div class=\"alert alert-success\">Thank you. Your order is being processed</div>");
    } else {
        echo("<div class=\"alert alert-danger\">OH THERE IS A PROBLEM.</div>");
    }
}

function deliveryTime()
{
    if (isset($_POST["expressOrder"])) {
        echo("Expected express delivery time is " . date('h:i:s A', strtotime('+ 45 minutes')));
    } else {
        echo("Expected delivery time is around " . date('h:i:s A', strtotime('+ 45 minutes')));
    }
}


//your products with their price.
if ($_GET["food"] == 1 || empty($_GET)) {
    $products = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5]
    ];
} else {
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
}

$_SESSION['totalValue'] = $totalValue = 0;

/*if (isset($_POST["products"])) {
    for ($i = 0; $i < count($_POST["products"]); $i++) {
            if ($_POST["products"] == true){
            $totalValue = $totalValue + $products[$i]['price'];
            var_dump($products[$i]['price']);
            $_SESSION['totalValue'] = $totalValue;
        }
    }
}*/
$values = [];
if (isset($_POST["products"])) {
    foreach ($products as $i => $product) {
        $totalValue = $totalValue + $_POST["products"][$i];
        var_dump($totalValue);
    }
/*    foreach ($products as $i => $product){
        //if ($_POST["products"] == true){
            $totalValue = $totalValue + $product['price'];
            var_dump($product['price']);
            $values[$i] = $totalValue;
            var_dump($totalValue);
            $_SESSION['totalValue'] = $totalValue;
        //}
    }*/
/*    $sum = 0;
    foreach ($_POST as $key => $value) {
        if (strpos($key, "products") == true) {
            $sum += $value;
        }
    }*/
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
