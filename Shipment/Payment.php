<?php
namespace Eduka\Shipment;

use \Eduka\Portal;
class Payment
{
    private $name;
    private $price;
    private $translator;
    
    public function __construct(Portal\ITranslator $translator){
        $this->translator = $translator;
    }
    
    public function getName(){
        return $this->translator->translate($this->name);
    }
    
    public function getPrice(){
        return $this->price;
    }
}
