<?php
namespace Eduka\Shop;
/**
 * Description of Product
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class Product {
    protected $name;
    protected $description;
    protected $sku;
    protected $id;
    
    public function __construct(){
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getSKU(){
        return $this->sku;
    }
    
    public function getId(){
        return $this->id;
    }
}

