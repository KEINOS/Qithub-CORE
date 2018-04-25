<?php

include('Functions.php');
include('Classes.php');

$msg = 'Hello World!';

/* Function */
echo return_message($msg) . PHP_EOL;

/* Class */
echo MyClass::returnMessage($msg) . PHP_EOL;

$test = new MyClass();
$test->echoMessage($msg);
echo PHP_EOL;