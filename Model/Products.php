<?php

namespace Model;

class Products
{
    private array $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];

    //otherwise change this to a constructor and put the else back in
    function getFood()
    {
        //your products with their price.
        if ($_GET["food"] == 1 || empty($_GET)) {
            $this->products = [
                ['name' => 'Club Ham', 'price' => 3.20],
                ['name' => 'Club Cheese', 'price' => 3],
                ['name' => 'Club Cheese & Ham', 'price' => 4],
                ['name' => 'Club Chicken', 'price' => 4],
                ['name' => 'Club Salmon', 'price' => 5]
            ];
        } else {
            $this->products = [
                ['name' => 'Cola', 'price' => 2],
                ['name' => 'Fanta', 'price' => 2],
                ['name' => 'Sprite', 'price' => 2],
                ['name' => 'Ice-tea', 'price' => 3],
            ];
        }
        return $this->products;
    }

    function getPrice()
    {
        $_SESSION['totalValue'] = $totalValue = 0;

        if (isset($_POST["products"])) {
            foreach ($this->products as $i => $product) {
                //I had to change the "value" of the $_POST["products"] to = the price in the foreach loop in the view for this to work
                $totalValue = $totalValue + $_POST["products"][$i];
            }
        }
        return $_SESSION['totalValue'];
    }
}