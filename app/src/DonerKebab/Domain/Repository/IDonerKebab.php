<?php
namespace App\DonerKebab\Domain\Repository;

use App\DonerKebab\Domain\Entity\Bread;
use App\DonerKebab\Domain\Entity\DonerKebab;
use App\DonerKebab\Domain\Entity\Meat;
use App\DonerKebab\Domain\Entity\Salad;

interface IDonerKebab
{

    public function placeOrder(DonerKebab $donerKebab):string;
    public function getDonnerKebabById(string $id):DonerKebab;
    public function getMeatByName(string $name):Meat;
    public function getSaladByName(string $name):Salad;
    public function getBreadByName(string $name):Bread;

}