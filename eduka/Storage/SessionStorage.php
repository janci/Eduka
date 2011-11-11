<?php
namespace Eduka\Storage;
class SessionStorage implements IStorage
{	
	private static $sessionStarted=false;
	private $name;
	public function __construct($storage_name){
            $this->name = $storage_name;
            if(!self::$sessionStarted) {
                session_start();
                self::$sessionStarted = true;
            }
	}
	
	public function read($var){
		if(isset($_SESSION['__jESHOP__'],$_SESSION['__jESHOP__'][$this->name],$_SESSION['__jESHOP__'][$var])) return $_SESSION['__jESHOP__'][$this->name][$var];
		else return null;
	}
	
	public function write($var, $val){
		$_SESSION['__jESHOP__'][$this->name][$var] = $val;
	}
	
	public function check($var){
		return isset($_SESSION['__jESHOP__'],$_SESSION[$this->name],$_SESSION['__jESHOP__'][$var]);
	}
	
	public function remove($var){
		unset($_SESSION['__jESHOP__'][$this->name][$var]);
	}
	
	public function clean(){
		$_SESSION['__jESHOP__'][$this->name]=array();
	}
	
}
