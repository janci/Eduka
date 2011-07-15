<?php
namespace Eduka\Portal\DI;

/**
 * Description of EdukaContainer
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class EdukaContainer implements \Eduka\Portal\DI\IContainer { 
    private $services;
    
    public function addService($name, $service) {
        if($this->hasService($name)) throw new DIException("Service ".$name." already exist!");
            $this->services[$name] = $service;
    }
    
    public function getService($name) {
        if(!$this->hasService($name)) throw new DIException("Unknown service ".$name);
        return $this->services[$name];
    }
    
    public function hasService($name) {
        return isset($this->services[$name]);
    }
    
    public function removeService($name) {
        unset($this->services[$name]);
    }
    
}

