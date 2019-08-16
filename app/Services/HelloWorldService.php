<?php
namespace App\Service;
class HelloWorldService implements HelloWorldServiceInterface
{
    public function doHelloWorld($x)
    {
        echo 'do awesome thing !!!' . $x;
    }
}