<?php
namespace App\Context\DonnerKebab\Infrastructure\Controller;


use App\Context\DonerKebab\Application\Query\OrderDonnerQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DonnerKebabGetEndpoint extends AbstractController
{
    private OrderDonnerQueryHandler $queryHandler;

    public function __construct(OrderDonnerQueryHandler $queryHandler)
    {
        $this->queryHandler=$queryHandler;
    }

    public function getDonnerKebab(string $id): Response
    {

        try{
            $donner=$this->queryHandler->handle($id);

            return new JsonResponse(

                [
                    "bread"=>$donner->getBread(),
                    "salad"=>$donner->getSalad(),
                    "meat"=>$donner->getMeat(),
                    "price"=>(double)$donner->getPrice()
                ]
                , Response::HTTP_OK

            );
        }
        catch (\Exception $e) {
            return new JsonResponse(
                ["error" => $e->getMessage()],
                Response::HTTP_NOT_FOUND
            );
        }
    }
}