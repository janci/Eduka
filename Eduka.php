<?php
namespace Eduka;

/**
 * Eduka is main class for eDuka project
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class Eduka {
    /** @var Portal\DI\IContainer */
    private $container;
    
    /**
     * Create new eduka shop
     * @param Portal\DI\IContainer $container 
     */
    public function __construct(Portal\DI\IContainer $container){
        $this->container = $container;
    }
    
    /**
     * Return DI container
     * @return Portal\DI\IContainer 
     */
    public function getContainer(){
        return $this->container;
    }
    
    /**
     * Return current customer
     * @return Shop\Customer 
     */
    public function getCustomer(){
        if ($this->container->hasService('customer')) 
                return $this->container->getService('customer');
        
        $storage = new Storage\SessionStorage('eduka_basket');
        $basket = new Shop\Basket($storage);
        $this->container->addService('customer', new Shop\Customer($basket));
        return $this->container->getService('customer');
    }
    
    /**
     * Return service translator
     * @return Portal\ITranslator 
     */
    public function getTranslator(){
        if ($this->container->hasService('translator')) 
                return $this->container->getService('translator');
        
        $this->container->addService('translator', new Portal\EdukaTranslator());
        return $this->container->getService('translator');
    }
    
    
    public function getProductCatalog(){
        
    }
}

