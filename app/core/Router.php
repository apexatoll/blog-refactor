<?php namespace core;

class Router {
	public function get($path, $callback){
		$this->add_route("GET", $path, $callback);
	}
	public function post($path, $callback){
		$this->add_route("POST", $path, $callback);
	}
	private function add_route($type, $path, $cb){
		$this->routes[$type][]= new Route($path, $cb);
	}
	public function route(){
		$uri   = $this->get_uri();
		$route = $this->find_route($uri);
		$this->execute($route, $uri);
	}
	private function get_uri(){
		return $_SERVER['REQUEST_URI'];
	}
	private function get_method(){
		return $_SERVER['REQUEST_METHOD'];
	}
	private function find_route($uri){
		foreach($this->routes[$this->get_method()] as $route)
			if($route->matches_uri($uri))
				return $route;
	}
	public function execute(Route $route, $uri){
		try {
			$msg = $route->call($uri);
			if($msg)
				Response::success($msg);
		}
		catch(\Exception $e){
			Response::error($e->getMessage());
		}
	}
}
