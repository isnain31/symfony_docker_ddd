<?php
namespace App\DonerKebab\Application\Command;

use App\DonerKebab\Application\Command\ValueObjects\DonerKebabOrder;
use App\DonerKebab\Domain\Entity\DonerKebab;
use App\DonerKebab\Domain\Repository\IDonerKebab;

class DonerOrderCommandHandler
{

    private IDonerKebab $repository;

    public function __construct(IDonerKebab $donnerKebabRepo)
    {
        $this->repository=$donnerKebabRepo;
    }

    public function handle(DonerKebabOrder $order){


        $donnerKebab=DonerKebab::create(
            $this->repository->getMeatByName($order->getMeat()),
            $this->repository->getSaladByName($order->getSalad()),
            $this->repository->getBreadByName($order->getBread())

        );

        $this->repository->placeOrder($donnerKebab);

    }

}