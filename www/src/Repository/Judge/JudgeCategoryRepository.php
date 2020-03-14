<?php

namespace App\Repository\Judge;

use App\Entity\Judge\JudgeCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method JudgeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method JudgeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method JudgeCategory[]    findAll()
 * @method JudgeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JudgeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JudgeCategory::class);
    }

    // /**
    //  * @return JudgeCategory[] Returns an array of JudgeCategory objects
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
    public function findOneBySomeField($value): ?JudgeCategory
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
