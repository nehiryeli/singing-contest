<?php

namespace App\Repository\Contest;

use App\Entity\Contest\ContestWinner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContestWinner|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContestWinner|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContestWinner[]    findAll()
 * @method ContestWinner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContestWinnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContestWinner::class);
    }

    // /**
    //  * @return ContestWinner[] Returns an array of ContestWinner objects
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
    public function findOneBySomeField($value): ?ContestWinner
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
