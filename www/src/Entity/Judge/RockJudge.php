<?php


namespace App\Entity\Judge;

use App\Entity\Round\RoundContestantScore;
use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class RockJudge extends Judge implements JudgeInterface
{
    const RANDOM_MIN = 0;
    const RANDOM_MAX = 10;
    const LOW_THRESHOLD = 50.0;
    const LOW_SCORE = 5;
    const MID_THRESHOLD = 74.9;
    const MID_SCORE = 8;
    const HIGH_THRESHOLD = 75;
    const HIGH_SCORE = 10;
    const ROCK_GENRE = "Rock";

    /**
     * This judge's favourite genre is `Rock`. For any other genre,
     * the `RockJudge` gives a random integer score out of 10, regardless of the calculated contestant score.
     * For the `Rock` genre, this judge gives a score based on the calculated contestant score
     *  - less than 50.0 results in a judge score of 5, 50.0 to 74.9 results in an 8,
     * while 75 and above results in a 10.
     */

    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundRoundContestantScore
     * @return mixed
     */
    public function scoring(RoundContestantScore $roundRoundContestantScore)    {
        // if round is rock genre
        if($roundRoundContestantScore->getRound()->getGenre() == self::ROCK_GENRE){

            if(in_array($roundRoundContestantScore, range(0, self::LOW_THRESHOLD))){
                $score = self::LOW_SCORE;
            }else if(in_array($roundRoundContestantScore, range(self::LOW_THRESHOLD, self::MID_THRESHOLD))){
                $score = self::MID_SCORE;
            }else{
                $score = self::HIGH_SCORE;
            }

        // if round is not rock genre, return random score
        }else{
            $score = rand(self::RANDOM_MIN, self::RANDOM_MAX);
        }
        return $score;

    }
}