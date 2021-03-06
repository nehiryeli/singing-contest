<?php

namespace App\Repository\Contest;


use App\Entity\Contest\Contest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Contest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contest[]    findAll()
 * @method Contest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contest::class);
    }

    public function getUncompletedContest()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.isCompleted = 0')
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult()
            ;
    }


    public function getLastContests(int $numberOfContest){
        return $this->createQueryBuilder('c')
            ->andWhere('c.isCompleted = 1')
            ->setMaxResults($numberOfContest)
            ->addOrderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult()
            ;

    }

    // /**
    //  * @return Contest[] Returns an array of Contest objects
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
    public function findOneBySomeField($value): ?Contest
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
