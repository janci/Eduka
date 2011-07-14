<?php
namespace Eduka\Shop;

/**
 * Description of Customer
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class Customer {
   private $basket;
   public function __construct(Basket $basket){
       $this->basket = $basket;
   }
   
   public function getBasket(){
       return $this->basket;
   }
}

