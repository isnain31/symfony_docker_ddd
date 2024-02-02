<?php
namespace App\Context\DonnerKebab\Application\Query;

use App\Context\DonnerKebab\Domain\Exceptions\DonnerKebabNotFoundException;
use App\Context\DonnerKebab\Domain\Repository\IDonnerKebab;
use App\Context\DonnerKebab\Application\DTO\DonnerKebabDTO;

class OrderDonnerQueryHandler
{

    private IDonnerKebab $repository;

    public function __construct(IDonnerKebab $donnerKebabRepo)
    {
        $this->repository=$donnerKebabRepo;
    }

    /**
     * @throws DonnerKebabNotFoundException
     */
    public function handle(string $orderNumber):DonnerKebabDTO{

        $donnerKebab=$this->repository->getDonnerKebabById($orderNumber);
        return DonnerKebabDTO::createFromDB($donnerKebab);

    }

}