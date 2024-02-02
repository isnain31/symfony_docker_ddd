<?php

namespace App\Context\DonnerKebab\Infrastructure\Controller;

use App\Context\DonnerKebab\Application\Command\OrderDonner\OrderDonnerCommandHandler;
use App\Context\DonnerKebab\Application\ValueObjects\DonnerKebabOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonnerKebabPostEndpoint extends AbstractController
{
    private OrderDonnerCommandHandler $commandHandler;

    public function __construct(OrderDonnerCommandHandler $commandHandler){

        $this->commandHandler=$commandHandler;
    }


    public function postDonnerKebab(Request $request):Response{
        try{
            $donnerKebab=$this->commandHandler->handle(
                DonnerKebabOrder::create(
                    $request->get('meat'),
                    $request->get('salad'),
                    $request->get('bread')));
            return new JsonResponse(
                ["OrderId"=>$donnerKebab->getId()],
                Response::HTTP_CREATED

            );
        }
        catch (\Exception $e){
            return new JsonResponse(
                ["error"=>$e->getMessage()],
                Response::HTTP_BAD_REQUEST
            );
        }

    }
}