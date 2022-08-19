<?php
namespace App\DonerKebab\Domain\Entity;


class DonerKebab
{

    private string $id;
    private Meat $meat;
    private Salad $salad;
    private Bread $bread;
    private float $price;

    private function __construct(string $id,Meat $meat,Salad $salad,Bread $bread, float $price)
    {

        $this->id=$id;
        $this->meat=$meat;
        $this->salad=$salad;
        $this->bread=$bread;
        $this->price=$price;
    }

    static function create(Meat $meat,Salad $salad,Bread $bread):self{

        return new self(uniqid(),$meat, $salad, $bread,$meat->getPrice()+$salad->getPrice()+$bread->getPrice());
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId(): string
    {
        return $this->id;
    }



    /**
     * @return Meat
     */
    public function getMeat(): Meat
    {
        return $this->meat;
    }

    /**
     * @param Meat $meat
     */
    public function setMeat(Meat $meat): void
    {
        $this->meat = $meat;
    }

    /**
     * @return Salad
     */
    public function getSalad(): Salad
    {
        return $this->salad;
    }

    /**
     * @param Salad $salad
     */
    public function setSalad(Salad $salad): void
    {
        $this->salad = $salad;
    }

    /**
     * @return Bread
     */
    public function getBread(): Bread
    {
        return $this->bread;
    }

    /**
     * @param Bread $bread
     */
    public function setBread(Bread $bread): void
    {
        $this->bread = $bread;
    }


}