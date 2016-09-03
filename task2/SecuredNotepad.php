<?php

class SecuredNotepad extends SimpleNotepad
{
	private $password;
	
	public function __construct($numberOfPAges){
		$p = $this->enterPass();
		$result = $this->securedPass($p);
		
		if( !$result){
			throw new Exception("Unsecured pass.");
		}
		parent::__construct($numberOfPAges);		
	}
	
	public function addText($pageNumber, $text){
		if($this->checkPass()){
			parent::addText($pageNumber, $text);
		}else{
			echo 'Wrong password.';
		}	
	}
	
	public function replaceText($pageNumber, $text){
		if($this->checkPass()){
			parent::replaceText($pageNumber, $text);
		} else {
			echo 'Wrong password.';
		}
	}
	
	public function deleteText($pageNumber){
		if($this->checkPass()){
			parent::deleteText($pageNumber);
		} else {
			echo 'Wrong password.';
		}		
	}
	
	public function printInfoPages(){
		if($this->checkPass()){
			parent::printInfoPages();
		} else {
			echo 'Wrong password.' . PHP_EOL;
		}		
	}
	
	private function checkPass(){
		$pass = readline("Enter your password.", PHP_EOL);
		if ( !empty($_GET['pass']) && $_GET['pass'] == $pass){
			return true;
		}
		return false;
	}
	
	private function enterPass(){
		return readline('Enter pass', PHP_EOL);
	}
	
	private function securedPass($pass){		
		$re = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).+$/";
		
		if( strlen($pass) > 5 && preg_match($re, $pass, $matches)){
			$_GET['pass'] = $pass;
			$this->password = $pass;
			return true;
		}
		return false;
	}	
}