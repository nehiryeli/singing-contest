<?php


namespace App\Tests\Entity\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Judge\MeanJudge;
use App\Entity\Round\RoundContestantScore;
use PHPUnit\Framework\TestCase;

/**
 * This judge gives every contestant with a calculated contestant score less than 90.0 a judge score of 2.
 * Any contestant scoring 90.0 or more instead receives a 10.
 */

class MeanJudgeTest extends TestCase
{
    /**
     * @var MeanJudge
     */
    private $meanJudge;
    /**
     * @var Contestant
     */
    private $contestant;

    protected function setUp()
    {
        $this->meanJudge = new MeanJudge();
        $this->contestant = new Contestant();

    }

    public function testMeanJudgeLowScore()
    {
        $this->contestant->setIsSick(0);

        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setContestant($this->contestant);

        $roundRoundContestantScore->setScore($this->meanJudge::THRESHOLD - 0.1);
        $this->assertEquals($this->meanJudge::LOW_SCORE, $this->meanJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore($this->meanJudge::THRESHOLD);
        $this->assertEquals($this->meanJudge::HIGH_SCORE, $this->meanJudge->scoring($roundRoundContestantScore));


    }
    public function testMeanJudgeHighScore()
    {
        $this->contestant->setIsSick(0);

        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setContestant($this->contestant);

        $roundRoundContestantScore->setScore($this->meanJudge::THRESHOLD + 0.1);
        $this->assertEquals($this->meanJudge::HIGH_SCORE, $this->meanJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore($this->meanJudge::THRESHOLD);
        $this->assertEquals($this->meanJudge::HIGH_SCORE, $this->meanJudge->scoring($roundRoundContestantScore));


    }
}