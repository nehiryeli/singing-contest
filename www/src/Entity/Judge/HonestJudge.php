<?php


namespace App\Entity\Judge;

use App\Entity\Contestant\Contestant;
use App\Entity\Contestant\ContestantScore;
use App\Entity\Round\Round;
use App\Entity\Round\RoundContestantScore;
use App\Entity\Round\RoundJudgeScore;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class HonestJudge extends Judge implements JudgeInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;


    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundScore
     * @return mixed
     */
    public function scoring($roundScore)
    {
        /** @var ContestantScore $roundScore */

        /*
         * To get judge score do minus 0.1 because boundaries are included(like 10.0 not 9.9) than dived to 10 (base)
         * and add 1 point coz scores starts from 1
         * ||Calculate Score Range||Judge Score||
            |     0.1 - 10.0        |      1     |
            |    10.1 - 20.0        |      2     |
            |    20.1 - 30.0        |      3     |
            |    30.1 - 40.0        |      4     |
            |    40.1 - 50.0        |      5     |
            |    50.1 - 60.0        |      6     |
            |    60.1 - 70.0        |      7     |
            |    70.1 - 80.0        |      8     |
            |    80.1 - 90.0        |      9     |
            |    90.1 - 100.0       |     10     |
         */
        return intval(($roundScore->getScore() - 0.1)/10) + 1;



    }
}