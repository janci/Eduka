<?php
require __DIR__ . '/../bootstrap.php';

$storage = new \Eduka\Storage\MemoryStorage();

$basket  = new \Eduka\Shop\Basket($storage);
$product = new \Eduka\Shop\Product;

$basket->addProduct($product);
$basket->removeProduct($product);

$basket->clear();

//Assert::same(1,2);
