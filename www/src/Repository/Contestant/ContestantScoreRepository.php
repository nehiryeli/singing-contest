<?php

namespace App\Repository\Contestant;

use App\Entity\Contestant\ContestantScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContestantScore|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContestantScore|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContestantScore[]    findAll()
 * @method ContestantScore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContestantScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContestantScore::class);
    }

    // /**
    //  * @return ContestantScore[] Returns an array of ContestantScore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContestantScore
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
