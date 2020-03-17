<?php


namespace App\Tests\Entity\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Genre\Genre;
use App\Entity\Judge\RockJudge;
use App\Entity\Round\Round;
use App\Entity\Round\RoundContestantScore;
use PHPUnit\Framework\TestCase;
/**
 * This judge's favourite genre is `Rock`. For any other genre,
 * the `RockJudge` gives a random integer score out of 10, regardless of the calculated contestant score.
 * For the `Rock` genre, this judge gives a score based on the calculated contestant score
 *  - less than 50.0 results in a judge score of 5, 50.0 to 74.9 results in an 8,
 * while 75 and above results in a 10.
 */
class RockJudgeTest extends TestCase
{
    /**
     * @var RockJudge
     */
    private $rockJudge;
    /**
     * @var Contestant
     */
    private $contestant;

    protected function setUp()
    {
        $this->rockJudge = new RockJudge();
        $this->contestant = new Contestant();
    }

    public function testRockJudgeNonRockGenreScoring()
    {
        $this->contestant->setIsSick(0);
        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setContestant($this->contestant);

        $genre = new Genre();
        $genre->setName("Blues");

        $round = new Round();
        $round->setGenre($genre);
        $roundRoundContestantScore->setRound($round);

        $this->assertGreaterThanOrEqual(0, $this->rockJudge->scoring($roundRoundContestantScore));
        $this->assertLessThanOrEqual(10, $this->rockJudge->scoring($roundRoundContestantScore));
    }

    public function testRockJudgeRockGenreScoring()
    {
        $this->contestant->setIsSick(0);
        //create Round Contestant Score
        $roundRoundContestantScore = new roundContestantScore();
        $roundRoundContestantScore->setContestant($this->contestant);


        $genre = new Genre();
        $genre->setName("Rock");


        $round = new Round();

        $round->setGenre($genre);
        $roundRoundContestantScore->setRound($round);



        $roundRoundContestantScore->setScore($this->rockJudge::LOW_THRESHOLD - 0.1);
        $this->assertEquals($this->rockJudge::LOW_SCORE, $this->rockJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore($this->rockJudge::LOW_THRESHOLD);
        $this->assertEquals($this->rockJudge::MID_SCORE, $this->rockJudge->scoring($roundRoundContestantScore));

        $roundRoundContestantScore->setScore($this->rockJudge::HIGH_THRESHOLD);
        $this->assertEquals($this->rockJudge::HIGH_SCORE, $this->rockJudge->scoring($roundRoundContestantScore));
    }
}