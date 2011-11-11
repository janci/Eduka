<?php
require __DIR__ . '/../bootstrap.php';

$storage = new \Eduka\Storage\MemoryStorage();

$basket   = new \Eduka\Shop\Basket($storage);
$customer = new \Eduka\Shop\Customer($basket);

Assert::same($basket,$customer->getBasket());
