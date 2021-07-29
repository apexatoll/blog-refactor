<?php namespace config;

//require_once(__DIR__."/config.php");
//\core\Loader::initialize();


class Env {
	public static function initialize($file = ".env"){
		$f = file_get_contents(APP."/config/$file");
		$f = explode("\n", $f);
		$f = array_filter($f);
		//print_r($f);
		foreach($f as $line){
			//putenv($line);
			//putenv(str_replace(" ", "", $line));
			$split = preg_split("/\s+=\s+/", $line);
			$_ENV[$split[0]] = $split[1];
			//print_r($split);
		}
		//echo getenv("DB_NAME");
		//print_r($_ENV);
			//$key = 
	}


}

//Env::initialize();


?>
