<?php
namespace Eduka\Shop;

class Basket
{
    /** @var \Eduka\Storage\IStorage */
    private $storage;
    
    /** @var ProductPack[] */
    private $products;
    
    /**
     * Create new basket
     * @param \Eduka\Storage\IStorage $storage 
     */
    public function __construct(\Eduka\Storage\IStorage $storage){
        $this->storage = $storage;
    }
    
    /**
     * Add new product to basket
     * @param Product $product 
     */
    public function addProduct(ProductPack $product){
        if(!isset($this->products[$product->getId()]))
            $this->products[$product->getId()] = $product;
        else {
            $id = $product->getId();
            $this->products[$id]->addAmount($product->getAmount());
        }
        $this->storage->write('products', $this->products);
    }

    /**
     * Get product from basket
     * @param int $entryId
     * @return Product 
     */
    public function getProduct($entryId){
        if (isset($this->products[$entryId])) return $this->products[$entryId];
        return null;
    }

    /**
     * Remove product from basket
     * @param Product $product 
     */
    public function removeProduct(Product $product){
        unset($this->products[$product->getId()]);
        $this->storage->write('products', $this->products);
    }

    /**
     * Get basket price
     */
    public function getPrice(){
    }
    
    /**
     * Clear all basket
     */
    public function clear(){
        unset($this->products);
        $this->storage->remove('products');
    }
}
