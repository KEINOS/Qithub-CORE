<?php
namespace Qithub;

include_once('Constants.php');
include_once('Functions.php');
include_once('Classes.php');

$test = new Core();
echo $test->getOption('sample');
print_r($test->dumpOptions());

set_option('hoge','hogehoge');
print_r(dump_option());
echo get_option('hoge') . PHP_EOL;