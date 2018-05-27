<?php

include_once('vendor/autoload.php');
include_once('bin/Qithub-CORE.phar');

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
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
        $result = \Qithub\Core::getVersion();
        $this->assertTrue(is_string(trim($result)));
        $this->assertTrue(is_string(trim($result)));
        $this->assertTrue(is_string(trim($result)));
    }

    public function testEncode()
    {
        // Test data
        $array = array();
        $max   = rand(5, 15);
        for ($i=0; $i<$max; $i++) {
            $array[] = md5(rand());
        }
        $enc = \Qithub\encode($array);
        $dec = \Qithub\decode($enc);
        $this->assertSame($array, $dec);
    }
}
