<?php

namespace App\Context\DonnerKebab\Domain\Exceptions;

class InvalidOrderPlacedException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct("Invalid Donner Kebab Order was placed due to ".$message);
    }

}