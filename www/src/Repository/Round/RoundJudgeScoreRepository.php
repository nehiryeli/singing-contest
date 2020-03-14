<?php

namespace App\Repository\Round;

use App\Entity\Round\RoundJudgeScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RoundJudgeScore|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoundJudgeScore|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoundJudgeScore[]    findAll()
 * @method RoundJudgeScore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoundJudgeScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoundJudgeScore::class);
    }

    // /**
    //  * @return RoundJudgeScore[] Returns an array of RoundJudgeScore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoundJudgeScore
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
