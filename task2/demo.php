<?php

require_once 'autoload.php';
require_once 'readline.php';

// $simpleNotepad = new SimpleNotepad(15);

// $simpleNotepad->addText(0, 'gfdsg');
// $simpleNotepad->addText(1, 'aaaaa');

// $simpleNotepad->addText(14, 'aaaaa');

// $simpleNotepad->replaceText(1, 'replaced');
// $simpleNotepad->printInfoPages();

try{
	$securedNotepad = new SecuredNotepad(20);
}catch (Exception $e){
	echo $e->getMessage();
}


// $securedNotepad->addText(0, 'page 1 text');

// $securedNotepad->printInfoPages();

// $electronicSecuredNotepad = new ElectronicSecuredNotepad('123', 10);

// $electronicSecuredNotepad->start();

// $electronicSecuredNotepad->addText(0, 'text added');

// $electronicSecuredNotepad->printInfoPages();


