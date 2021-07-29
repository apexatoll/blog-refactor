<?php namespace core;

class Response {
	public static function success($msg = null){
		echo self::template(true, $msg);
	}
	public static function error($msg = null){
		echo self::template(false, $msg);
	}
	private static function template($success, $message){
		return json_encode([
			"success" => $success, 
			"message" => $message
		]);
	}
}
