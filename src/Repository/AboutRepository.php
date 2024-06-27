<?php

namespace App\Repository;

use App\Entity\About;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<About>
 *
 * @method About|null find($id, $lockMode = null, $lockVersion = null)
 * @method About|null findOneBy(array $criteria, array $orderBy = null)
 * @method About[]    findAll()
 * @method About[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, About::class);
    }

    public function getAbout($langue)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->andWhere('a.language =  :language')
            ->setParameter('language', $langue);

        $qb->orderBy('a.id', 'DESC')
            ->setMaxResults(1);
   
        return $qb->getQuery()->getOneOrNullResult();
    }
}
