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
    
    /** Eduka version */
    const VERSION="1.0";
    
    /**
     * Create new eduka shop
     * @param Portal\DI\IContainer $container 
     */
    public function __construct(Portal\DI\IContainer $container){
        $this->container = $container;
    }
    
    /**
     * Create work environment
     */
    protected function _install(){
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
     * Return service database
     * @return \PDO 
     */
    protected function getDatabase(){
        if($this->container->hasService('database'))
                return $this->container->getService('database');
        
        $config = $this->getConfigurator();
        $dsn      = $config->database['dsn'];
        $username = $config->database['username'];
        $passwd   = $config->database['password'];
        
        $options[\PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
        
        $this->container->addService('database', new \PDO($dsn, $username, $passwd, $options));
        return $this->container->getService('database');
    }
    
    /**
     * Return service configuration
     * @return Portal\Configuration\IConfiguration 
     */
    protected function getConfigurator(){
        if($this->container->hasService('eduka-config'))
                return $this->container->getService('eduka-config');
        
        $this->container->addService('eduka-config', new Portal\Configuration\INIConfiguration());
        return $this->container->getService('eduka-config');
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

    /**
     * Return product list
     * @return Shop\ProductList 
     */
    public function getProductList(){
        return new Shop\ProductList($this->getDatabase());
    }
}

