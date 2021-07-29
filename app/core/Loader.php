<?php namespace core;

class Loader {
	public static function initialize(){
		spl_autoload_register(function($class){
			self::load($class);
		});
	}
	private static function load($class){
		$path = self::path($class);
		if(file_exists($path))
			require_once($path);
	}
	private static function parse_namespace($class){
		return str_replace("\\", DIRECTORY_SEPARATOR, $class);
	}
	private static function path($class){
		return APP."/".self::parse_namespace($class).".php";
	}
}
