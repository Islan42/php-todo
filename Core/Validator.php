<?php
namespace Core;

class Validator {
	public static function string($value, $min = 1, $max = INF){
		$value = trim($value);
		
		return strlen($value) >= $min && strlen($value) <= $max;
	}
	
	public static function email($value){
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
	
	public static function json($value){
		return ( (bool) json_decode($value) ) && ! is_numeric($value);
	}
}