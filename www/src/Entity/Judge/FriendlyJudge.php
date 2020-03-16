<?php


namespace App\Entity\Judge;

use App\Entity\Contestant\Contestant;
use App\Entity\Contestant\ContestantScore;
use App\Entity\Round\Round;
use App\Entity\Round\RoundContestantScore;
use Doctrine\ORM\Mapping\Entity;

/**
 * This judge gives every contestant a score of 8 unless they have a calculated contestant score of less than
 * or equal to 3.0, in which case the `FriendlyJudge` gives a 7. If the contestant is sick, the `FriendlyJudge`
 * awards a bonus point, regardless of calculated contestant score.
 */

/** @Entity */
class FriendlyJudge extends Judge implements JudgeInterface
{
    const BONUS = 1;
    const HIGH_POINT = 8; // The judge gives every contestant a score of 8 unless they have a calculated contestant score of less than or equal to 3.0
    const LOW_POINT = 7;

    /**
     * Each Judge has their own calculation method based on their category
     * @param RoundContestantScore $roundRoundContestantScore
     * @return mixed
     */
    public function scoring(RoundContestantScore  $roundRoundContestantScore)
    {
        /** @var RoundContestantScore $contestantScore */
        $score = $roundRoundContestantScore->getScore() <= 3 ? self::LOW_POINT : self::HIGH_POINT;
        $score += $roundRoundContestantScore->getContestant()->getIsSick() ? self::BONUS : 0;

        return $score;

    }
}