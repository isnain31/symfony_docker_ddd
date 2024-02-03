<?php

namespace App\Context\DonnerKebab\Domain\Exceptions;

class BreadNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Bread Not Found");
    }
}