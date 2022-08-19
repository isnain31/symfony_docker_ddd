<?php

namespace App\DonerKebab\Infrastructure\Controller;

use App\DonerKebab\Application\Command\DonerOrderCommandHandler;
use App\DonerKebab\Application\Command\ValueObjects\DonerKebabOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonerKebabPostEndpoint extends AbstractController
{
    private DonerOrderCommandHandler $commandHandler;

    public function __construct(DonerOrderCommandHandler $commandHandler){

        $this->commandHandler=$commandHandler;
    }


    public function postDonerKebab(Request $request){
        $returnValue=$this->commandHandler->handle(new DonerKebabOrder($request->get('meat'),$request->get('salad'),$request->get('bread')));
        return new Response($returnValue);
    }
}