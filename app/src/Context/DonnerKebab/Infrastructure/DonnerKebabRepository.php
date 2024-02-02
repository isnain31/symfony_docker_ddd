<?php namespace App\Context\DonnerKebab\Infrastructure;

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
        return $this->getEntityManager()->getRepository(Bread::class)->findOneByType($name);
    }
    public function getDonnerKebabById(string $id): DonnerKebab
    {
        return $this->findOneById($id);
    }
    public function getSaladByName(string $name): Salad
    {
        return $this->getEntityManager()->getRepository(Salad::class)->findOneByType($name);
    }
    public function getMeatByName(string $name): Meat
    {
        return $this->getEntityManager()->getRepository(Meat::class)->findOneByType($name);
    }

    public function placeOrder(DonnerKebab $DonnerKebab):void
    {
        $this->getEntityManager()->persist($DonnerKebab);
        $this->getEntityManager()->flush();

    }
}
