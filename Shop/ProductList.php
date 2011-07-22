<?php
namespace Eduka\Shop;

/**
 * Description of ProductList
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class ProductList implements \Eduka\Paginator\IPaginatable {
    private $paginator;
    private $products;
    private $objproducts;
    
    /** @var \PDO */
    private $database;
    public function __construct(\PDO $database){
        $this->database = $database;
    }
    
    public function setFilter($property, $value){
        
    }
    
    public function getProducts(){
        
        $q = $this->database->prepare("SELECT * FROM `product`");
        $q->execute();
        $this->products = $q->fetchAll(\PDO::FETCH_CLASS, '\Eduka\Shop\Product');
        return $this->products;
    }
    
    public function getCount() {
        return count($this->products);
    }
    
    public function getItem($number) {
        return $this->products[($number-1)];
    }
    
}
