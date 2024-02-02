<?php

namespace App\Context\DonnerKebab\Exceptions;

class InvalidDonnerOrderException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Invalid Donner Kebab Order");
    }
}