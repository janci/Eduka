<?php
namespace Eduka\Portal\Configuration;
/**
 * 
 * @author Švantner Ján <janci@janci.net>
 */
interface IConfiguration {
    
    /**
     * Get param from config
     */
    public function __get($param);
    
    /**
     * Check if param exist in config
     */
    public function __isset($param);
    
}

