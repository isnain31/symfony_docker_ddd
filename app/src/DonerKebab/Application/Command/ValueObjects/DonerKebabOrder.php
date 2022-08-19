<?php

namespace App\DonerKebab\Application\Command\ValueObjects;

class DonerKebabOrder
{
    private string $meat;
    private string $bread;
    private string $salad;

    public function __construct(string $meat,  string $salad,string $bread)
    {

        $this->meat=$meat;
        $this->bread=$bread;
        $this->salad=$salad;
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