<?php

namespace Controller;

use Model\Products;

include_once 'Model/Products.php';

class ProductController
{
    private $load;

    public function render()
    {
        $products = new Products();
        $productNames = $products->getFood();
        $productValues = $products->getPrice();
        $renderArray = [
            'products' => $products->getFood(),
            'price' => $products->getPrice(),
        ];
        require_once 'View/form-view.php';
        //require 'View/form-view.html.twig';

        /*
        //https://documentation.concrete5.org/developers/pages-themes/working-with-pages/single-pages/sending-data-to-a-page-view
        $list = \Model\Products::class->getFood();
        $this->set('products', $list);
        
        //https://www.cloudways.com/blog/how-to-pass-data-in-codeigniter/
        $renderArray = [
            'products' => $products->getFood(),
            'price' => $products->getPrice(),
            ];
        $this->load->view('View/form-view.php', $renderArray);*/
    }

    private function set(string $string, $list)
    {
    }
}