<?php

include_once 'vendor/autoload.php';

class Car
{
    public function drive(): string
    {

        return 'The car is driving.';
    }

    public function __construct(public string $color, public string $model) {}

}

$toyota = new Car('red', 'Toyota');

dd($toyota);
