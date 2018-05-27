<?php

include_once('vendor/autoload.php');
include_once('bin/Qithub-CORE.phar');
//include_once('src/Constants.php');
//include_once('src/Functions.php');
//include_once('src/Classes.php');

use PHPUnit\Framework\TestCase;

class ClassesTest extends TestCase
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

    public function testMyClass()
    {
        $message = 'Hello, World!';

        $result = \Qithub\MyClass::returnMessage($message);
        $this->assertTrue($result === $message);

        $test    = new \Qithub\MyClass();
        $result  = $test->returnMessage($message);

        $this->assertTrue($result === $message);
    }

    public function testGetVersion()
    {
        $version_old = 'v0.1.0';
        $version_cur = \Qithub\Core::getVersion();
        $result      = version_compare($version_cur, $version_old, '>');
        $this->assertTrue($result);
    }
}
