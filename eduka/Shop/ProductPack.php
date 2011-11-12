<?php
namespace Eduka\Shop;
class ProductPack extends Product
{
    private $amount=1;
    
    public function getAmount(){
        return $this->amount;
    }
    
    public function addAmount($amount){
        $this->amount += $amount;
    }
}
