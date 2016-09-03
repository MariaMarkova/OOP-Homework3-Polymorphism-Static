<?php

require_once 'autoload.php';
require_once 'readline.php';

// $simpleNotepad = new SimpleNotepad(15);

// $simpleNotepad->addText(0, 'gfdsg');
// $simpleNotepad->addText(1, 'aaaaa');

// $simpleNotepad->addText(14, 'aaaaa');

// $simpleNotepad->replaceText(1, 'replaced');
// $simpleNotepad->printInfoPages();

$securedNotepad = new SecuredNotepad('123456', 20);

$securedNotepad->addText(0, 'page 1 text');

$securedNotepad->printInfoPages();
