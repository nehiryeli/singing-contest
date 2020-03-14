<?php

namespace App\Repository\Contest;

use App\Entity\Contest\ContestContestant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContestContestant|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContestContestant|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContestContestant[]    findAll()
 * @method ContestContestant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContestContestantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContestContestant::class);
    }

    // /**
    //  * @return ContestContestant[] Returns an array of ContestContestant objects
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
    public function findOneBySomeField($value): ?ContestContestant
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
