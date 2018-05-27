<?php
namespace Qithub;

//include_once('bin/Qithub-CORE.phar');
include_once('Constants.php');
include_once('Functions.php');
include_once('Classes.php');

$msg = 'Hello World.';

if (! is_phar()) {
    echo 'Running PHP directly.' . PHP_EOL;
    /* Function */
    echo return_message($msg) . PHP_EOL;

    /* Class */
    //echo MyClass::returnMessage($msg) . PHP_EOL;

    $array = [
        "hoge" => 'hoge',
    ];

    echo encode($array) . PHP_EOL;

    set_option('one');
    set_option('two');
    set_option('three');

    print_r(get_value());

    $test = new Core();
    echo 'Version(Norm): ', $test->getVersion(), PHP_EOL;
    echo 'Version(Full): ', PHP_EOL;
    $version = explode(PHP_EOL, $test->getVersion(true));
    foreach ($version as $line) {
        echo "\t", trim($line), PHP_EOL;
    }
} else {
    //echo 'Running via phar.' . PHP_EOL;
}
