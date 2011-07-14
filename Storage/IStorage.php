<?php
namespace Eduka\Storage;
interface IStorage
{
	function read($key);
	
	function write($key, $value);
	
	function check($key);
	
	function remove($key);
	
	function clean();
}
