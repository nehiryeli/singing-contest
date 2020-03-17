<?php


namespace App\Entity\Judge;

use App\Entity\Round\RoundContestantScore;
use Doctrine\ORM\Mapping\Entity;

/**
 * This judge gives a random score out of 10, regardless of the calculated contestant score.
 */

/** @Entity */
class RandomJudge extends Judge implements JudgeInterface
{
    const MIN_SCORE = 0;
    const MAX_SCORE = 10;



    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundRoundContestantScore
     * @return mixed
     */
    public function scoring(RoundContestantScore $roundRoundContestantScore)
    {
        return rand(self::MIN_SCORE, self::MAX_SCORE);
    }
}