<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm {
	protected $errors = [];
	protected $attributes = [];
	
	public function __construct($attributes){
		$this -> attributes = [
			'email' => $attributes['email'],
		];
		
		if (! Validator::email($attributes['email'])){
			$this -> errors['email'] = 'Formato de Email incorreto';
		}
		
		if (! Validator::string($attributes['password'], 8, 255)){
			$this -> errors['password'] = 'A senha deve ter pelo menos 8 caracteres';
		}
	}
	
	public static function validate($attributes){
		$instance = new static($attributes);
		
		return $instance;
	}
	
	public function failed(){
		return count($this -> errors);
	}
	
	public function errors(){
		return $this -> errors;
	}
	public function attributes(){
		return $this -> attributes;
	}
	public function error($field, $message){
		$this -> errors[$field] = $message;
		
		return $this;
	}
}