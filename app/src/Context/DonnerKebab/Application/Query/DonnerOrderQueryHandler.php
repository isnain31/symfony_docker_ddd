<?php
namespace App\Context\DonerKebab\Application\Query;

use App\Context\DonerKebab\Domain\Repository\IDonnerKebab;
use App\Context\DonnerKebab\Application\Query\DTO\DonnerKebabDTO;

class DonnerOrderQueryHandler
{

    private IDonnerKebab $repository;

    public function __construct(IDonnerKebab $donnerKebabRepo)
    {
        $this->repository=$donnerKebabRepo;
    }

    public function handle(string $orderNumber):DonnerKebabDTO{

        $donnerKebab=$this->repository->getDonnerKebabById($orderNumber);
        return DonnerKebabDTO::createFromDB($donnerKebab);

    }

}