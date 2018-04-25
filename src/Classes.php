<?php

class MyClass
{
    public static function returnMessage($message)
    {
        return (string) $message;
    }

    public function echoMessage($message)
    {
        echo $this->returnMessage($message);
    }
}
