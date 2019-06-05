<?php
namespace App\Service;
class HelloWorldService implements HelloWorldServiceInterface
{
    public function doHelloWorld()
    {
        echo 'do awesome thing !!!';
    }
}