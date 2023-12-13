<?php

class Database {
	protected $connection;
	public $statement;
	
	public function __construct($dsn, $user = 'root', $password= 'password'){
		$this -> connection = new PDO($dsn, $user, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		]);
		return $this;
	}
	
	public function query($query, $params = []){
		$this -> statement = $this -> connection -> prepare($query);
		$this -> statement -> execute($params);
		
		return $this;
	}
	
	public function fetch(){
		return $this -> statement -> fetch();
	}
	
	public function fetchAll(){
		return $this -> statement -> fetchAll();
	}
}