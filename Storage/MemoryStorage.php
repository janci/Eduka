<?php
class MemoryStorage implements IStorage
{
    private $storage;
    public function __construct(){
    }
    
    public function read($key) {
        return $this->storage[$key];
    }
    
    public function check($key) {
        return isset($this->storage[$key]);
    }
    
    public function clean() {
        $this->storage=array();
    }
    
    public function remove($key) {
        unset($this->storage[$key]);
    }
    
    public function write($key, $value) {
        $this->storage[$key][$value];
    }
	
}
