<?php

namespace Http\Forms;
use Core\Validator;

class RegisterForm {
	protected $errors = [];
	protected $attributes = [];
	
	public function __construct($attributes){
		$this -> attributes = [
			'name' => $attributes['name'],
			'email' => $attributes['email'],
		];
		
		if(! Validator::string($attributes['name'], 2) ){
			$this -> errors['name'] = 'Nome deve ter pelo menos 2 caracteres.';
		}
		if(! Validator::email($attributes['email']) ){
			$this -> errors['email'] = 'Formato de email inválido.';
		}
		if(! Validator::string($attributes['password'], 8) ){
			$this -> errors['password'] = 'Senha deve ter pelo menos 8 caracteres.';
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