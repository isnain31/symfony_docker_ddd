<?php namespace App\DonerKebab\Infrastructure;

use App\DonerKebab\Domain\Repository\IDonerKebab;
use App\DonerKebab\Domain\Entity\Bread;
use App\DonerKebab\Domain\Entity\DonerKebab;
use App\DonerKebab\Domain\Entity\Meat;
use App\DonerKebab\Domain\Entity\Salad;
use Doctrine\ORM\EntityRepository;

class DonerKebabRepository extends EntityRepository implements IDonerKebab
{
    public function getBreadByName(string $name): Bread
    {
        return $this->getEntityManager()->getRepository(Bread::class)->findOneByType($name);
    }
    public function getDonnerKebabById(string $id): DonerKebab
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

    public function placeOrder(DonerKebab $donerKebab): string
    {
        // TODO: Implement placeOrder() method.
        $this->getEntityManager()->persist($donerKebab);
        $this->getEntityManager()->flush();
        echo $donerKebab->getId();
        return $donerKebab->getId();
    }
}
