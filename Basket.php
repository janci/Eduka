<?php
class Basket
{
	private IStorage $storage;
	public function __construct(IStorage $storage){
		$this->storage = $storage;
	}
	
	public function addProduct(Product $product){
		$this->storage->products = $product;
	}
	
	public function getProduct(int $productId){
	}
	
	public function removeProduct(Product $product){
	}
	
	public function getAmount(){
	}
	
	public function getPrice(){
	}
}
