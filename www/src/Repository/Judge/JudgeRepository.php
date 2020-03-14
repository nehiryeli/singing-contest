<?php

namespace App\Repository\Judge;

use App\Entity\Judge\Judge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Judge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Judge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Judge[]    findAll()
 * @method Judge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JudgeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Judge::class);
    }

    // /**
    //  * @return Judge[] Returns an array of Judge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Judge
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
