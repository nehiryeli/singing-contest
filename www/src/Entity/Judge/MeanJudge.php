<?php


namespace App\Entity\Judge;

use App\Entity\Round\RoundContestantScore;
use Doctrine\ORM\Mapping\Entity;

/**
 * This judge gives every contestant with a calculated contestant score less than 90.0 a judge score of 2.
 * Any contestant scoring 90.0 or more instead receives a 10.
 */

/** @Entity */
class MeanJudge extends Judge implements JudgeInterface
{


    const THRESHOLD = 90.0;
    const LOW_SCORE = 2;
    const HIGH_SCORE = 10;
    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundContestantScore
     * @return mixed
     */
    public function scoring(RoundContestantScore $roundContestantScore)
    {
        return $roundContestantScore->getScore() < self::THRESHOLD ? self::LOW_SCORE : self::HIGH_SCORE;

    }
}