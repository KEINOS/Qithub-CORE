<?php

include_once('vendor/autoload.php');
include_once('src/Constants.php');
include_once('src/Functions.php');

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

    static function provideDataTest()
    {
        return [
            [ '2.9', '<',  '2.9.6', true  ],   // #0
            [ '2.9', '>',  '2.9.6', false ],   // #1
            [ '2.9', '<',  '3.0'  , true  ],   // #2
            [ '2.9', '<=', '2.8.9', false ],   // #3
            [ '2.9', '!=', '2.8.9', true  ],   // #4
            [ '2.8', '!=', '2.8.0', false ],   // #5*
            [ '2.9', '==', '2.9.0', true  ],   // #6*
            [ '2.9', '==', '2.9.1', false ],   // #7
            [ '3.0 beta', '>', '2.9.9', true], // #8
        ];
    }

    /**
     * @dataProvider provideDataTest
     */
    public function testCompareVersion($arg1, $arg2, $arg3, $arg4)
    {
        $this->assertSame($arg4, Qithub\compareVersion($arg1, $arg2, $arg3));
    }
}
