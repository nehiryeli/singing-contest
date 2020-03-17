<?php


namespace App\Tests\Entity\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Judge\RandomJudge;
use App\Entity\Round\RoundContestantScore;
use PHPUnit\Framework\TestCase;

/**
 * This judge gives a random score out of 10, regardless of the calculated contestant score.
 */

class RandomJudgeTest extends TestCase
{
    /**
     * @var RandomJudge
     */
    private $randomJudge;
    /**
     * @var Contestant
     */
    private $contestant;

    protected function setUp()
    {
        $this->randomJudge = new RandomJudge();
        $this->contestant = new Contestant();

    }

    public function testRandomJudgeScoring()
    {
        $this->contestant->setIsSick(0);

        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setContestant($this->contestant);
        $this->assertGreaterThanOrEqual(0, $this->randomJudge->scoring($roundRoundContestantScore));
        $this->assertLessThanOrEqual(10, $this->randomJudge->scoring($roundRoundContestantScore));
    }


}