<?php
namespace Eduka;

/**
 * Eduka is main class for eDuka project
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class Eduka {
    private $container;
    public function __construct(DI\IContainer $container){
        $this->container = $container;
    }
    
    
    public function getContainer(){
        return $this->container;
    }
    
    public function getCustomer(){
        if ($this->container->hasService('customer')) 
                return $this->container->getService('customer');
        
        $storage = new Storage\SessionStorage('eduka_basket');
        $basket = new Shop\Basket($storage);
        $this->container->addService('customer', new Shop\Customer($basket));
        return $this->container->getService('customer');
    }
    
    public function getTranslator(){
        if ($this->container->hasService('translator')) 
                return $this->container->getService('translator');
        
        $this->container->addService('translator', new Portal\EdukaTranslator());
        return $this->container->getService('translator');
    }
    
    
    public function getProductCatalog(){
        
    }
}

