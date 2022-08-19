<?php
namespace App\DonerKebab\Application\Query;

use App\DonerKebab\Application\Query\DTO\DonerKebabDTO;
use App\DonerKebab\Domain\Repository\IDonerKebab;

class DonerOrderQueryHandler
{

    private IDonerKebab $repository;

    public function __construct(IDonerKebab $donnerKebabRepo)
    {
        $this->repository=$donnerKebabRepo;
    }

    public function handle(string $orderNumber):DonerKebabDTO{


        $donnerKebab=$this->repository->getDonnerKebabById($orderNumber);

        return new DonerKebabDTO($donnerKebab->getMeat()->getType(),$donnerKebab->getSalad()->getType(),$donnerKebab->getBread()->getType(),$donnerKebab->getPrice());

    }

}