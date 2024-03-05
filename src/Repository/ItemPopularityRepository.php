<?php

namespace App\Repository;

use App\Entity\ItemPopularity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItemPopularity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemPopularity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemPopularity[]    findAll()
 * @method ItemPopularity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemPopularityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemPopularity::class);
    }

    // /**
    //  * @return ItemPopularity[] Returns an array of ItemPopularity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemPopularity
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
