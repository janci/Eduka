<?php
class Basket
{
    private $storage;
    private $products;
    public function __construct(IStorage $storage){
        $this->storage = $storage;
    }

    public function addEntry(Entry $product){
        if(!isset($this->products[$product->getId()]))
            $this->products[$product->getId()] = $product;
        else {
            $id = $product->getId();
            $this->products[$id]->addAmount($product->getAmount());
        }
        $this->storage->write('products', $this->products);
    }

    public function getEntry(int $entryId){
        if (isset($this->products[$entryId])) $this->products[$entryId];
        return null;
    }

    public function removeProduct(Product $product){
        unset($this->products[$productId]);
        $this->storage->write('products', $this->products);
    }


    public function getPrice(){
    }
    
    public function clear(){
        unset($this->products);
        $this->storage->remove('products');
    }
}