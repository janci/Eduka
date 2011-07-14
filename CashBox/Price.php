<?php
namespace Eduka\CashBox;
class Price
{
	private $price;
	private $money;
	private $currency=Currency::EUR;
	private $tax=20;
	
	public function __construct($price, $withTax=false){
		$this->money = Currency::getMoney($this->currency);
		if($withTax)
			$this->price = $price/$this->getTaxIndex();
		else
			$this->price = $price;
	}
	
	public function setCurrency($currency){
		$this->currency = $currency;
	}
	
	public function getCurrency(){
		return $this->currency;
	}
	
	private function getTaxIndex(){
		return ($this->tax/100)+1;
	}
	
	public function setTax($tax){
		$this->tax = (int) $tax;
	}
	
	public function getTax(){
		return $this->tax;
	}
	
	public function getPrice($currency=NULL){
		if(isset($currency)) {
			$price = Currency::convert($this->currency, $currency, $this->price);
		} else {
			$price = $this->price;
		}
		return $this->formatPrice($price);
	}
	
	private function formatPrice($price){
		return Currency::getSymbol($this->currency,true).number_format($price,2).Currency::getSymbol($this->currency);
	}
	
	public function getPriceWithTax(){
		return $this->formatPrice($price*$this->getTaxIndex());
	}
	
	public function getConvertedPrice($currency=Currency::SKK){
		$newPrice = new Price(Currency::convert($this->currency, $currency, $this->price));
		$newPrice->setCurrency($currency);
		return $newPrice;
	}
}
