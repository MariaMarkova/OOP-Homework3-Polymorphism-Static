<?php

class ElectronicSecuredNotepad extends AbstractÅlectronicDevice
{
	private $isStarted;
	private $password;
	private $pages;
	
	public function __construct($pass, $numOfPages){
		$this->isStarted = false;
		
		$this->password = $pass;
		$_GET['passElectronicNotepad'] = $pass;
		
		for($i = 0; $i < $numOfPages; $i++){
			$this->pages[$i] = new Page();
		}
	}
	
	public function start(){
		$this->isStarted = true;
	}
	
	public function stop(){
		$this->isStarted = false;
	}
	
	public function isStarted(){
		return $this->isStarted;
	}
	
	public function addText($pageNumber, $text){
		if( $this->isStarted() && $this->checkPass()){
			if ( $this->checkPageNumber($pageNumber)){
				$this->pages[$pageNumber]->addTextPage($text);
			}else{
				echo "Page $pageNumber doesnt exist." . PHP_EOL;
			}
		}else {
			echo 'Wrong pass or ...' , PHP_EOL;
		}
	
	}
	
	public function replaceText($pageNumber, $text){
		if( $this->isStarted() && $this->checkPass()){
			if ( $this->checkPageNumber($pageNumber)){
				$this->pages[$pageNumber]->deleteTextPage();
				$this->pages[$pageNumber]->addTextPage($text);
			}else{
				echo "Page $pageNumber doesnt exist." . PHP_EOL;
			}
		}
		
	}
	
	public function deleteText($pageNumber){
		if( $this->isStarted() && $this->checkPass()){
			if ( $this->checkPageNumber($pageNumber)){
				$this->pages[$pageNumber]->deleteTextPage();
			}else{
				echo "Page $pageNumber doesnt exist." . PHP_EOL;
			}
		}
		
	}
	
	public function printInfoPages(){
		if( $this->isStarted() && $this->checkPass()){
			for($i = 0; $i < count($this->pages); $i++){
				if( !empty($this->pages[$i]->getText())) {
					echo "Page " . ($i+1) . '-' . $this->pages[$i]->printPage() . PHP_EOL;
				}
			}
		}		
	}
	
	public  function searchWord($word){
		
	}
	
	public  function printAllPagesWithDigits(){
		
	}
	
	private function checkPageNumber($number){
		if($number < 0 || $number > count($this->pages)-1){
			return false;
		}
		return true;
	}
	
	private function checkPass(){
		$pass = readline("Enter your password.", PHP_EOL);
		if ( !empty($_GET['passElectronicNotepad']) && $_GET['passElectronicNotepad'] == $pass){
			return true;
		}
		return false;
	}
}