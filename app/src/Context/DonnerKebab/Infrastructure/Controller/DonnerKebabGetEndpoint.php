<?php
namespace App\Context\DonnerKebab\Infrastructure\Controller;


use App\Context\DonerKebab\Application\Query\DonnerOrderQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DonnerKebabGetEndpoint extends AbstractController
{
    private DonnerOrderQueryHandler $queryHandler;

    public function __construct(DonnerOrderQueryHandler $queryHandler)
    {
        $this->queryHandler=$queryHandler;
    }

    public function getDonnerKebab(string $id): Response
    {

        $donner=$this->queryHandler->handle($id);
        return new Response(json_encode(["bread"=>$donner->getBread(),"salad"=>$donner->getSalad(),"meat"=>$donner->getMeat(),"price"=>(double)$donner->getPrice()]));

    }
}