<?php
namespace App\Context\DonnerKebab\Application\Command\OrderDonner;

use App\Context\DonnerKebab\Application\ValueObjects\DonnerKebabOrder;
use App\Context\DonnerKebab\Application\DTO\DonnerKebabDTO;
use App\Context\DonnerKebab\Domain\Exceptions\BreadNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\InvalidOrderPlacedException;
use App\Context\DonnerKebab\Domain\Exceptions\MeatNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\SaladNotFoundException;
use App\Context\DonnerKebab\Domain\Model\DonnerKebab;
use App\Context\DonnerKebab\Domain\Repository\IDonnerKebab;

class OrderDonnerCommandHandler
{

    private IDonnerKebab $repository;

    public function __construct(IDonnerKebab $donnerKebabRepo)
    {
        $this->repository=$donnerKebabRepo;
    }

    /**
     * @throws BreadNotFoundException
     * @throws InvalidOrderPlacedException
     * @throws SaladNotFoundException
     * @throws MeatNotFoundException
     * @throws \Exception
     */
    public function handle(DonnerKebabOrder $order): DonnerKebabDTO
    {

        $this->validateDonnerKebabOrder($order);
        $donnerKebab=DonnerKebab::create(
            $this->repository->getMeatByName($order->getMeat()),
            $this->repository->getSaladByName($order->getSalad()),
            $this->repository->getBreadByName($order->getBread())
        );

        $this->repository->placeOrder($donnerKebab);

        return DonnerKebabDTO::createFromDB($donnerKebab);

    }

    private function validateDonnerKebabOrder(DonnerKebabOrder $order): void
    {

        if($order->getMeat()==null || $order->getSalad()==null || $order->getBread()==null){
            throw new \Exception("Invalid Donner Kebab Order");
        }

    }

}