<?php
namespace App\Context\DonnerKebab\Application\Query;

use App\Context\DonnerKebab\Domain\Repository\IDonnerKebab;
use App\Context\DonnerKebab\Application\Query\DTO\DonnerKebabDTO;

class OrderDonnerQueryHandler
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