<?php

namespace Controller;

use Model\Products;


class ProductController
{
    public function render()
    {
        $products = new Products();
        $productNames = $products->getFood();
        $productValues = $products->getPrice();
        require 'View/form-view.php';
    }
}