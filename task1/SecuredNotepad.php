<?php

class SecuredNotepad extends SimpleNotepad
{
	private $password;
	
	public function __construct($pass, $numberOfPAges){
		parent::__construct($numberOfPAges);
		$this->password = $pass;
		$_GET['pass'] = $pass;
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
	
}