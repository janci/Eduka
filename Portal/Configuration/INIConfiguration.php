<?php
namespace Eduka\Portal\Configuration;

/**
 * Description of Configurator
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class INIConfiguration {
    private $parse_data;
    /**
     * Construct for create new config from filename
     * @param string $filename 
     */
    public function __construct($filename="config.ini"){
        $this->parse_data = parse_ini_file($filename, true);
    }
    
    public function __get($param){
        if(!isset($this->parse_data[$param])) return NULL;
        return $this->parse_data[$param];
    }
    
    public function __isset($param){
        return isset($this->parse_data);
    }
}

