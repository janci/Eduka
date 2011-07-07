<?php
class Currency
{
    const EUR = 1;
    const SKK = 2;
    private static $convertTable = array(
            self::EUR=> 1,
            self::SKK=> 30.1260
    );

    private static $symbolTable = array(
            self::EUR => array('',' €'),
            self::SKK => array('',' SK')
    );

    private static $moneyTable = array(
            self::EUR=> array(200,100,50,20,10,5,2,1,0.5,0.2,0.1),
            self::SKK=> array(200,100,50,20,10,5,2,1,0.5,0.2,0.1) //old currency
    );

    public static function convert($fromCurrency, $toCurrency, $price){
            return ($price/Currency::$convertTable[$fromCurrency])*Currency::$convertTable[$toCurrency];
    }

    public static function getMoney($currency=self::EUR){
            if(!isset(self::$moneyTable[$currency])) throw new Exception('Unknown currency type');
            return self::$moneyTable[$currency];
    }

    public static function getSymbol($currency=self::EUR, $before=false){
            if($before) return self::$symbolTable[$currency][0];
            else return self::$symbolTable[$currency][1];
    }
}
