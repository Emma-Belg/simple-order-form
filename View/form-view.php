<?php //require 'Controller/FormController.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <?php
    whatIsHappening();
    ?>
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1" id="food" name="food">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0" id="food" name="food">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <?php
                //echo($renderArray['email']);
                ?>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email"
                       value = "test email<?php //sessionData("email"); ?>"
                       class="form-control"/>
            </div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <?php
                    //echo($renderArray['streetName']);
                    //isRequired("street");
                    //lettersOnly("street");
                    ?>
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control"
                           value = "test street<?php //sessionData("street"); ?>">
                </div>
                <div class="form-group col-md-6">
                    <?php
                    //$this->renderArray['streetNumber'];
                    //isRequired("streetnumber");
                    //numberOnly("streetnumber");
                    ?>
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control"
                           value = "<?php //sessionData("streetnumber"); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?php
                    //$this->renderArray['city'];
                    //isRequired("city");
                    ?>
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control"
                           value = "<?php //sessionData("city"); ?>">
                </div>
                <div class="form-group col-md-6">
                    <?php
                    //$this->renderArray['postcode'];
                    //isRequired("zipcode");
                    //correctCount();
                    ?>
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control"
                           value = "<?php //sessionData("zipcode"); ?>">
                </div>
            </div>
            <?php
            //sentMessage();
            ?>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="<?php echo $product['price'] ?>" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" name="normalOrder" class="btn btn-primary">Normal Order</button>
        <button type="submit" name="expressOrder" class="btn btn-primary">Express Delivery</button>
        <?php
        //deliveryTime();
        ?>

    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>