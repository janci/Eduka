<?php
namespace Eduka\Portal\DI;

/**
 * Description of IContainer
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
interface IContainer {
    public function getService($name);
    
    public function addService($name, $service);
    
    public function removeService($name);
    
    public function hasService($name);
}

