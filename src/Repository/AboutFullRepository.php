<?php

namespace App\Repository;

use App\Entity\AboutFull;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AboutFull>
 *
 * @method AboutFull|null find($id, $lockMode = null, $lockVersion = null)
 * @method AboutFull|null findOneBy(array $criteria, array $orderBy = null)
 * @method AboutFull[]    findAll()
 * @method AboutFull[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutFullRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AboutFull::class);
    }

    public function getFullAbout($langue)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->andWhere('a.language =  :language')
            ->setParameter('language', $langue);

        $qb->orderBy('a.id', 'DESC')
            ->setMaxResults(1);
   
        return $qb->getQuery()->getOneOrNullResult();
    }
    
}
