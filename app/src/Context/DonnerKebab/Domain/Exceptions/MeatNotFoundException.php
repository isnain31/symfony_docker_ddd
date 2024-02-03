<?php

namespace App\Context\DonnerKebab\Domain\Exceptions;

class MeatNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Meat Not Found");
    }
}