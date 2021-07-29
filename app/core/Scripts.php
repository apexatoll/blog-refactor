<?php namespace core;

class Scripts {
	public static function load(){
		foreach(self::scandir() as $file)
			echo self::script("lib/$file");
		echo self::script("main.js");
	}
	public static function jquery(){
		echo "<script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>";
	}
	private static function js_path($file=null){
		return ROOT."/public/js/$file";
	}
	private static function scandir(){
		return array_diff(scandir(self::js_path("lib")), [".", ".."]);
	}
	private static function script($file){
		return "<script src='js/$file' defer></script>";
	}
}
