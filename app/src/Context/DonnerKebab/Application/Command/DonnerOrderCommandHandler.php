<?php
namespace App\Context\DonnerKebab\Application\Command;

use App\Context\DonnerKebab\Domain\Repository\IDonnerKebab;
use App\Context\DonnerKebab\Application\Command\ValueObjects\DonnerKebabOrder;
use App\Context\DonnerKebab\Application\Query\DTO\DonnerKebabDTO;
use App\Context\DonnerKebab\Domain\Model\DonnerKebab;

class DonnerOrderCommandHandler
{

    private IDonnerKebab $repository;

    public function __construct(IDonnerKebab $donnerKebabRepo)
    {
        $this->repository=$donnerKebabRepo;
    }

    public function handle(DonnerKebabOrder $order): DonnerKebabDTO
    {
        $donnerKebab=DonnerKebab::create(
            $this->repository->getMeatByName($order->getMeat()),
            $this->repository->getSaladByName($order->getSalad()),
            $this->repository->getBreadByName($order->getBread())

        );

        $this->repository->placeOrder($donnerKebab);
        return DonnerKebabDTO::createFromDB($donnerKebab);

    }

}