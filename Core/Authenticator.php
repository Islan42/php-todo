<?php
namespace Core;

class Authenticator {
	public function atempt($email, $password){
		$user = App::resolve('Core\Database') -> query('SELECT * FROM users WHERE email = :email', [
			'email' => $email,
		]) -> find();
		
		if ($user){
			if ($user['password'] === $password){
				$this -> login ([
					'name' => $user['name'],
					'email' => $user['email'],
					'id' => $user['id'],
				]);
				return true;
			}
		}
		
		return false;
	}
	
	public function login($user){
		Session::put('user', [
			'name' => $user['name'],
			'email' => $user['email'],
			'id' => $user['id'],
		]);
		
		session_regenerate_id();
	}
	public function logout(){
		Session::destroy();
	}
}