<?php


namespace App\Tests\Entity\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Judge\HonestJudge;
use App\Entity\Round\RoundContestantScore;
use PHPUnit\Framework\TestCase;

/**
 * This judge converts the calculated contestant score evenly using the following table:
 *          * ||Calculate Score Range||Judge Score||
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

class HonestJudgeTest extends TestCase
{
    /**
     * @var Contestant
     */
    private $contestant;
    /**
     * @var HonestJudge
     */
    private $honestJudge;

    protected function setUp()
    {
        $this->honestJudge = new HonestJudge();
        $this->contestant = new Contestant();
        $this->contestant->setIsSick(0);
    }

    public function testScoring(){
        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setContestant($this->contestant);

        $roundRoundContestantScore->setScore(10.0);
        $this->assertEquals(1, $this->honestJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore(10.1);
        $this->assertEquals(2, $this->honestJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore(20.1);
        $this->assertEquals(3, $this->honestJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore(90.1);
        $this->assertEquals(10, $this->honestJudge->scoring($roundRoundContestantScore));
    }
}