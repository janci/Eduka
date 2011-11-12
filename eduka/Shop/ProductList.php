<?php
namespace Eduka\Shop;

/**
 * Description of ProductList
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class ProductList implements \Eduka\Paginator\IPaginatable {
    private $products;
    
    /** @var \PDO */
    private $database;
    public function __construct(\PDO $database){
        $this->database = $database;
    }
    
    public function setFilter($property, $value){
        
    }
    
    public function getProducts(){
        
        $q = $this->database->prepare("SELECT product.* FROM `product` LEFT OUTER JOIN `product_property` ON (product_id=product.id) LEFT OUTER JOIN `property` ON (property_id=property.id)");
        $q->execute();
        $this->products = $q->fetchAll(\PDO::FETCH_CLASS, '\Eduka\Shop\ProductPack');
        return $this->products;
    }
    
    public function getCount() {
        if(!isset($this->products)) $this->getProducts ();
        return count($this->products);
    }
    
    public function getItem($number) {
        if(!isset($this->products)) $this->getProducts ();
        return $this->products[($number-1)];
    }
    
}
