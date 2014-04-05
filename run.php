<?php


define('ROOT',__DIR__);


// define here which checkers are necessary
$checkers_array = array('valid','domain','words','characters','patterns');


// optional - define here path for strings list
$checker = new \Validator\Validators\EmailValidator($checkers_array);
$checker->go();

// define which output you want
$output = new \Validator\Output\FileOutput($checker);
$output->output();
$output->printOut();


function __autoload($class)
{
   $parts = explode('\\', $class);
   unset($parts[0]);
   $classname = implode("/", $parts);
   require_once(__DIR__ . '/' . $classname . '.php');
}


