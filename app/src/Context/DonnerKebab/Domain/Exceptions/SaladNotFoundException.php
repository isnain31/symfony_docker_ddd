<?php

namespace App\Context\DonnerKebab\Domain\Exceptions;

class SaladNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Salad Not Found");
    }
}