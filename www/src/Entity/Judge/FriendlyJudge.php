<?php


namespace App\Entity\Judge;

use App\Entity\Contestant\Contestant;
use App\Entity\Contestant\ContestantScore;
use App\Entity\Round\Round;
use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class FriendlyJudge extends Judge implements JudgeInterface
{
    const BONUS = 1;
    const HIGH_POINT = 8; // The judge gives every contestant a score of 8 unless they have a calculated contestant score of less than or equal to 3.0
    const LOW_POINT = 7;
    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundScore
     * @return mixed
     */
    public function scoring($roundScore)
    {
        /** @var ContestantScore $roundScore */
        $score = $roundScore->getScore() <= 3 ? self::LOW_POINT : self::HIGH_POINT;
        $score += $roundScore->getContestant()->getIsSick() ? self::BONUS : 0;

        return $score;
        // TODO: Implement scoring() method.
    }
}