<?php
/**
 * 
 */
function autoload($className)
{
	//var_dump($className);
	$namespace = explode('\\', $className);
	$vendor = array_shift($namespace);
	$path = implode('/', $namespace);
	$fullPath = ECL_DIR . $path . ".php";
	//var_dump($fullPath);
	if(is_file($fullPath)){
		include ($fullPath);
	}
	return;
}
