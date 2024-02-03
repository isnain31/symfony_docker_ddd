<?php namespace App\Context\DonnerKebab\Infrastructure;

use App\Context\DonnerKebab\Domain\Exceptions\BreadNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\DonnerKebabNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\InvalidOrderPlacedException;
use App\Context\DonnerKebab\Domain\Exceptions\MeatNotFoundException;
use App\Context\DonnerKebab\Domain\Exceptions\SaladNotFoundException;
use App\Context\DonnerKebab\Domain\Repository\IDonnerKebab;
use App\Context\DonnerKebab\Domain\Model\Bread;
use App\Context\DonnerKebab\Domain\Model\DonnerKebab;
use App\Context\DonnerKebab\Domain\Model\Meat;
use App\Context\DonnerKebab\Domain\Model\Salad;
use Doctrine\ORM\EntityRepository;

class DonnerKebabRepository extends EntityRepository implements IDonnerKebab
{
    public function getBreadByName(string $name): Bread
    {
        $bread=$this->getEntityManager()->getRepository(Bread::class)->findOneByType($name);
        if(!$bread)
            throw new BreadNotFoundException();

        return $bread;

    }
    public function getDonnerKebabById(string $id): DonnerKebab
    {
        $donnerKebab= $this->findOneById($id);
        if(!$donnerKebab)
            throw new DonnerKebabNotFoundException();
        return $donnerKebab;
    }
    public function getSaladByName(string $name): Salad
    {

        $salad=$this->getEntityManager()->getRepository(Salad::class)->findOneByType($name);
        if(!$salad)
            throw new SaladNotFoundException();
        return $salad;
    }
    public function getMeatByName(string $name): Meat
    {
        $meat= $this->getEntityManager()->getRepository(Meat::class)->findOneByType($name);
        if(!$meat)
            throw new MeatNotFoundException();
        return $meat;
    }

    public function placeOrder(DonnerKebab $DonnerKebab):void
    {
        try {
            $this->getEntityManager()->persist($DonnerKebab);
            $this->getEntityManager()->flush();
        } catch (\Exception $e) {
            throw new InvalidOrderPlacedException($e->getMessage());
        }


    }
}
