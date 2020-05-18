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

echo '<p>products price</p>';
var_dump($products);
echo '<p>products price</p>';
var_dump($products['price']);

//$totalValue = 0;
//$totalValue = $products{'price'};
/*$totalPrice = [];
foreach ($products as $product) {
    number_format($product['price'], 2);
    array_push($totalPrice, $product);
}*/

/*if (isset($_POST["products"])) {
    foreach ($totalValue as $price) {
        $totalValue[$price]+= $totalValue;
        echo($product["price[price]"]);
    }
}*/
if (isset($_POST["products"])) {
    for ($i = 0; $i < count($_POST["products"]); $i++) {
            if ($_POST["products"] == true){
            $totalValue = $products[$i]['price'];
            echo $totalValue;
        }
    }

}
/*$userChoices = $_POST['products'];
for ($i = 0; $i < count($products); $i++) {
    if (isset($userChoices[$i])) {
        array_push($chosenFoods, $products[$i]);
        array_push($_SESSION['chosenfoods'], $products[$i]);
        $totalValue += $products[$i]{'price'};
        $_SESSION['totalvalue'] = $totalValue;
    }
}*/

/*foreach ($products as $key => $amount) {
    $prodPrice = $products[$key]['price'];
    $totalValue = $prodPrice * $amount;
}*/
echo $totalValue;

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
