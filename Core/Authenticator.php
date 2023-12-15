<?php
namespace Core;

class Authenticator {
	public function atempt($email, $password){
		$user = App::resolve('Core\Database') -> query('SELECT * FROM users WHERE email = :email', [
			'email' => $email,
		]) -> find();
		
		if ($user){
			if ($user['password'] === $password){
				// $this -> login ()
				return true;
			}
		}
		
		return false;
	}
	
	public function login($user){
		
	}
	public function logout(){}
}