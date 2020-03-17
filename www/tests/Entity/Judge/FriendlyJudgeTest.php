<?php


namespace App\Tests\Entity\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Judge\FriendlyJudge;
use App\Entity\Round\RoundContestantScore;
use PHPUnit\Framework\TestCase;

class FriendlyJudgeTest extends TestCase
{
    /**
     * @var FriendlyJudge
     */
    private $friendlyJudge;
    /**
     * @var Contestant
     */
    private $contestant;

    /**
     * FriendlyJudgeTest constructor.
     */
    protected function setUp()
    {
        $this->friendlyJudge = new FriendlyJudge();
        $this->contestant = new Contestant();

    }

    /**
     * The judge gives 8 point if calculated score is >= 4
     */
    public function testFriendlyJudgeHighScoring(){
        $this->contestant->setIsSick(0);

        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setScore($this->friendlyJudge::THRESHOLD + 0.1);
        $roundRoundContestantScore->setContestant($this->contestant);

        // check if 4 points get HIGH_POINT specified in const
        $this->assertEquals($this->friendlyJudge::HIGH_POINT, $this->friendlyJudge->scoring($roundRoundContestantScore));
    }

    /**
     * The judge gives 7 point if calculated score is < 4
     */
    public function testFriendlyJudgeLowScoring()
    {
        $this->contestant->setIsSick(0);

        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setScore($this->friendlyJudge::THRESHOLD);
        $roundRoundContestantScore->setContestant($this->contestant);

        // check if 3.9 points get LOW specified in const
        $this->assertEquals($this->friendlyJudge::LOW_POINT, $this->friendlyJudge->scoring($roundRoundContestantScore));

    }

    /**
     * If the contestant is sick, the `FriendlyJudge`
     * awards a bonus point, regardless of calculated contestant score.
     */
    public function testFriendlyJudgeSicknessBonusPoint()
    {
        $this->contestant->setIsSick(1);
        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setScore($this->friendlyJudge::THRESHOLD);
        $roundRoundContestantScore->setContestant($this->contestant);

        // check if 3 points get LOW specified in const
        $this->assertEquals($this->friendlyJudge::LOW_POINT + $this->friendlyJudge::BONUS, $this->friendlyJudge->scoring($roundRoundContestantScore));

    }
}