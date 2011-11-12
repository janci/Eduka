<?php
require_once "loader.php";

$shop = new Eduka\Eduka(new \Eduka\Portal\DI\EdukaContainer);
$customer = $shop->getCustomer();
$basket = $customer->getBasket();

$products = $shop->getProductList();
$pr = $products->getProducts();
$paginator = new Eduka\Paginator\Paginator($products, 10);

foreach($paginator as $pr){
    $basket->addProduct($pr);
    $pr = $basket->getProduct($pr->getId());
    echo "Name:".$pr->getName().'<br>';
    echo "Description:".$pr->getDescription().'<br>';
    echo "Code: ".$pr->getSKU().'<br>';
    echo '------------------------------------------<br>';
}
