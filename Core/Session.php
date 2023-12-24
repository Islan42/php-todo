<?php
namespace Core;

class Session {
	public static function put($key, $value){
		$_SESSION[$key] = $value;
	}
	
	public static function get($key, $default = NULL){
		return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
	}
	
	public static function has($key){
		return (bool) static::get($key);
	}
	
	public static function flash($key, $value){
		$_SESSION['_flash'][$key] = $value;
	}
	
	public static function unflash(){
		unset($_SESSION['_flash']);
	}
	
	public static function flush(){
		unset($_SESSION);
	}
	
	public static function destroy(){
		static::flush();
		
		session_destroy();
		
		$params = session_get_cookie_params();
		setcookie('PHPSESSID', '', time() - 1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
	}
	
	public static function userID(){
		$db = App::resolve(Database::class);
		$userEmail = static::get('user')['email'];
		
		$user = $db -> query('SELECT * FROM users WHERE email = :email', [
			'email' => $userEmail,
		]) -> findOrFail();
		
		return $user['id'];
	}
}