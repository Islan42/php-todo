<?php
namespace Core;
use Core\Middleware\Middleware;

class Router {
	protected $routes = [];
	
	public function add($uri, $controller, $method){
		$this -> routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => $method,
			'middleware' => NULL,
		];
		
		return $this;
	}
	public function get($uri, $controller){
		return $this -> add($uri, $controller, 'GET');
	}
	public function post($uri, $controller){
		return $this -> add($uri, $controller, 'POST');
	}
	
	public function route($uri, $method){
		foreach($this -> routes as $route){
			if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
				Middleware::resolve($route['middleware']);
				
				return require base_path('Http/controllers/' . $route['controller']);
			}
		}
		abort();
	}
	
	public function only($key){
		$index = array_key_last($this -> routes);
		$this -> routes[$index]['middleware'] = $key;
	}
}