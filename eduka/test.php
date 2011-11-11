<?php
require_once "loader.php";

$shop = new Eduka\Eduka(new \Eduka\Portal\DI\EdukaContainer);
$customer = $shop->getCustomer();
$basket = $customer->getBasket();

$products = $shop->getProductList();

$products->getProducts();
$paginator = new Eduka\Paginator\Paginator($products, 10);

foreach($paginator as $pr){
    
    echo "Name:".$pr->getName().'<br>';
    echo "Description:".$pr->getDescription().'<br>';
    echo '------------------------------------------<br>';
}