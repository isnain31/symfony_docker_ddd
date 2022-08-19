<?php
namespace App\DonerKebab\Infrastructure\Controller;


use App\DonerKebab\Application\Query\DonerOrderQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonerKebabGetEndpoint extends AbstractController
{
    private DonerOrderQueryHandler $queryHandler;

    public function __construct(DonerOrderQueryHandler $queryHandler)
    {
        $this->queryHandler=$queryHandler;
    }

    public function getDonerKebab(string $id){

        $doner=$this->queryHandler->handle($id);
        return new Response(json_encode(["bread"=>$doner->getBread(),"salad"=>$doner->getSalad(),"meat"=>$doner->getMeat(),"price"=>(double)$doner->getPrice()]));

    }
}