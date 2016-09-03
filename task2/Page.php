<?php


class Page
{
	
	private $title;
	private $text;
		
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		if( !empty($title)) {
			$this->title = $title;
		} else {
			echo 'Title can`t be empty.' . PHP_EOL;
		}
	}
	
	public function getText(){
		return $this->text;
	}
	
	public function setText($text){
		if( !empty($text)) {
			$this->text = $text;
		} else {
			echo 'Text can`t be empty.' . PHP_EOL;
		}
	}
	
	public function addTextPage($text){
		$this->text = $this->text . $text;
	}
	
	public function deleteTextPage(){
		$this->text = '';
	}
	
	public function printPage(){
		return 'Title: ' . $this->title . PHP_EOL . $this->text . PHP_EOL;
	}
	
	public function searchWord($word){
		if (strpos($this->text, $word) !== false){
			return true;
		}
		return false;
	}
	
	public function containsDigits(){
		return preg_match('/\\d/', $this->text) > 0;
	}
}