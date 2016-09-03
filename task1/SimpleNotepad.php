<?php

class SimpleNotepad extends AbstractNotepad
{
	
	private $pages;
	
	public function __construct($numberOfPAges){
		for($i = 0; $i < $numberOfPAges; $i++){
			$this->pages[$i] = new Page();
		}
		
	}
	
	public function addText($pageNumber, $text){
		if ( $this->checkPageNumber($pageNumber)){
			$this->pages[$pageNumber]->addTextPage($text);
		}else{
			echo "Page $pageNumber doesnt exist." . PHP_EOL;
		}
		
	}
	
	public function replaceText($pageNumber, $text){
		if ( $this->checkPageNumber($pageNumber)){
			$this->pages[$pageNumber]->deleteTextPage();
			$this->pages[$pageNumber]->addTextPage($text);
		}else{
			echo "Page $pageNumber doesnt exist." . PHP_EOL;
		}
	}
	
	public function deleteText($pageNumber){
		if ( $this->checkPageNumber($pageNumber)){
			$this->pages[$pageNumber]->deleteTextPage();
		}else{
			echo "Page $pageNumber doesnt exist." . PHP_EOL;
		}
	}
	
	public function printInfoPages(){
		for($i = 0; $i < count($this->pages); $i++){
			if( !empty($this->pages[$i]->getText())) {
				echo "Page " . ($i+1) . '-' . $this->pages[$i]->printPage() . PHP_EOL;
			}			
		}
	}
	
	private function checkPageNumber($number){
		if($number < 0 || $number > count($this->pages)-1){
			return false;
		}		
		return true;
	}
}