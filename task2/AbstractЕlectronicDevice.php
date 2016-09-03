<?php

abstract class AbstractÅlectronicDevice extends AbstractNotepad
{
	
	public abstract function start();
	public abstract function stop();
	public abstract function isStarted();
}