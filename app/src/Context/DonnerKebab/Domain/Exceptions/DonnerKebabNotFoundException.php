<?php

namespace App\Context\DonnerKebab\Domain\Exceptions;

class DonnerKebabNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Donner Kebab Not Found");
    }
}