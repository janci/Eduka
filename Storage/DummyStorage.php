<?php
class DummyStorage implements IStorage
{
    public function __construct(){
        
    }
    
    public function read($key) {
        return true;
    }
    
    public function check($key) {
        return true;
    }
    
    public function clean() {
    }
    
    public function remove($key) {   
    }
    
    public function write($key, $value) {
    }
}
