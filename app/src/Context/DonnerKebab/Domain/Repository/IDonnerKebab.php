<?php
namespace App\Context\DonnerKebab\Domain\Repository;

use App\Context\DonnerKebab\Domain\Exceptions\BreadNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\DonnerKebabNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\InvalidOrderPlacedException;
use App\Context\DonnerKebab\Domain\Exceptions\MeatNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\SaladNotFoundException;
use App\Context\DonnerKebab\Domain\Model\Bread;
use App\Context\DonnerKebab\Domain\Model\DonnerKebab;
use App\Context\DonnerKebab\Domain\Model\Meat;
use App\Context\DonnerKebab\Domain\Model\Salad;

interface IDonnerKebab
{

    /**
     * @param DonnerKebab $DonnerKebab
     * @return void
     * @throws InvalidOrderPlacedException
     */
    public function placeOrder(DonnerKebab $DonnerKebab): void;

    /**
     * @param string $id
     * @return DonnerKebab
     * @throws DonnerKebabNotFoundException
     */
    public function getDonnerKebabById(string $id):DonnerKebab;

    /**
     * @param string $name
     * @return Meat
     * @throws MeatNotFoundException
     */
    public function getMeatByName(string $name):Meat;

    /**
     * @param string $name
     * @return Salad
     * @throws SaladNotFoundException
     */
    public function getSaladByName(string $name):Salad;

    /**
     * @param string $name
     * @return Bread
     * @throws BreadNotFoundException
     */
    public function getBreadByName(string $name):Bread;

}