<?php

namespace App\Repository;

use App\Entity\Avant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Avant>
 *
 * @method Avant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avant[]    findAll()
 * @method Avant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avant::class);
    }

    public function getAvant($langue)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->andWhere('a.isActive =  :isActive')
            ->setParameter('isActive', true);

        $qb->andWhere('a.language =  :language')
            ->setParameter('language', $langue);
    
        $qb->orderBy('a.id', 'DESC')
            ->setMaxResults(1);
   
        return $qb->getQuery()->getOneOrNullResult();
    }
}
