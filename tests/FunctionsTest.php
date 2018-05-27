<?php

include_once('vendor/autoload.php');
include_once('bin/Qithub-CORE.phar');
//include_once('src/Constants.php');
//include_once('src/Functions.php');

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function setUp()
    {
        // Warning も確実にエラーとして扱うようにする
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            $msg  = 'Error #' . $errno . ': ';
            $msg .= $errstr . " on line " . $errline . " in file " . $errfile;
            throw new RuntimeException($msg);
        });
    }

    public function testReturnMessage()
    {
        $message = 'Hello, World!';
        $result  = Qithub\return_message($message);

        $this->assertTrue($result === $message);
    }
}
