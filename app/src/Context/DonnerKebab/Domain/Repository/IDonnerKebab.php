<?php
namespace App\Context\DonnerKebab\Domain\Repository;

use App\Context\DonnerKebab\Domain\Model\Bread;
use App\Context\DonnerKebab\Domain\Model\DonnerKebab;
use App\Context\DonnerKebab\Domain\Model\Meat;
use App\Context\DonnerKebab\Domain\Model\Salad;

interface IDonnerKebab
{

    public function placeOrder(DonnerKebab $DonnerKebab);
    public function getDonnerKebabById(string $id):DonnerKebab;
    public function getMeatByName(string $name):Meat;
    public function getSaladByName(string $name):Salad;
    public function getBreadByName(string $name):Bread;

}