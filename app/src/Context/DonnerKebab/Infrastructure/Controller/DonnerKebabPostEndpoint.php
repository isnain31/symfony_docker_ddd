<?php

namespace App\Context\DonnerKebab\Infrastructure\Controller;

use App\Context\DonnerKebab\Application\Command\DonnerOrderCommandHandler;
use App\Context\DonnerKebab\Application\Command\ValueObjects\DonnerKebabOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonnerKebabPostEndpoint extends AbstractController
{
    private DonnerOrderCommandHandler $commandHandler;

    public function __construct(DonnerOrderCommandHandler $commandHandler){

        $this->commandHandler=$commandHandler;
    }


    public function postDonnerKebab(Request $request):Response{
        $donnerKebab=$this->commandHandler->handle(
            DonnerKebabOrder::create($request->get('meat'),
                $request->get('salad'),
                $request->get('bread')));
        return new Response($donnerKebab->getId());
    }
}