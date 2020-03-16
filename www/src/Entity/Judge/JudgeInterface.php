<?php


namespace App\Entity\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Contestant\ContestantScore;
use App\Entity\Round\RoundContestantScore;

interface JudgeInterface
{
    /**
     * Each Judge has their own calculation method based on their category
     * @param RoundContestantScore $roundContestantScore
     * @return mixed
     */
    public function scoring(RoundContestantScore $roundContestantScore);

}