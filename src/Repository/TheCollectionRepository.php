<?php

namespace App\Repository;

use App\Entity\TheCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TheCollection>
 *
 * @method TheCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method TheCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method TheCollection[]    findAll()
 * @method TheCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TheCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TheCollection::class);
    }

    public function getAllCollections($langue)
    {
        $qb = $this->createQueryBuilder('t');

        $qb->andWhere('t.language =  :language')
            ->setParameter('language', $langue);

        $qb->andWhere('t.isActive =  :isActive')
            ->setParameter('isActive', true)
            ->orderBy('t.id', 'DESC');
   
        return $qb->getQuery()->getResult();
    }

    public function getCollectionMenu($langue)
    {
        $qb = $this->createQueryBuilder('t')
            ->innerJoin('t.pays', 'p')
            ->addSelect('p');

        $qb->andWhere('t.language =  :language')
            ->setParameter('language', $langue);

        $qb->andWhere('t.isActive =  :isActive')
            ->setParameter('isActive', true);
        
        $qb->orderBy('p.id', 'DESC');

        return $qb->getQuery()->getResult();
    }
}
