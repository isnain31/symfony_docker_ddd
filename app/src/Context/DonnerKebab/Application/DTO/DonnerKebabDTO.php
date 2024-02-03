<?php
namespace App\Context\DonnerKebab\Application\DTO;

use App\Context\DonnerKebab\Domain\Model\DonnerKebab;

class DonnerKebabDTO
{
    private string $meat;
    private string $bread;
    private string $salad;
    private string $price;

    private string $id;

    public function __construct(string $meat,  string $salad, string $bread, float $price)
    {

        $this->meat=$meat;
        $this->bread=$bread;
        $this->salad=$salad;
        $this->price=$price;
    }



    public static function createFromDB(DonnerKebab $donnerKebab): DonnerKebabDTO
    {
        $self=new self(
            $donnerKebab->getMeat()->getType(),
            $donnerKebab->getSalad()->getType(),
            $donnerKebab->getBread()->getType(),
            $donnerKebab->getPrice());
        $self->setId($donnerKebab->getId());
        return $self;

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float|string
     */
    public function getPrice(): float|string
    {
        return $this->price;
    }

    /**
     * @param float|string $price
     */
    public function setPrice(float|string $price): void
    {
        $this->price = $price;
    }


    /**
     * @return string
     */
    public function getMeat(): string
    {
        return $this->meat;
    }

    /**
     * @param string $meat
     */
    public function setMeat(string $meat): void
    {
        $this->meat = $meat;
    }

    /**
     * @return string
     */
    public function getBread(): string
    {
        return $this->bread;
    }

    /**
     * @param string $bread
     */
    public function setBread(string $bread): void
    {
        $this->bread = $bread;
    }

    /**
     * @return string
     */
    public function getSalad(): string
    {
        return $this->salad;
    }

    /**
     * @param string $salad
     */
    public function setSalad(string $salad): void
    {
        $this->salad = $salad;
    }

}