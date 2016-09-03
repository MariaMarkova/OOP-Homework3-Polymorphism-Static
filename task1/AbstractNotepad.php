<?php

abstract class AbstractNotepad
{
	
	public abstract function addText($pageNumber, $text);	
	public abstract function replaceText($pageNumber, $text);
	public abstract function deleteText($pageNumber);
	public abstract function printInfoPages();
}