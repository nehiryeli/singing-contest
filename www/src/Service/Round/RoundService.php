<?php


namespace App\Service\Round;


use App\Entity\Contest\Contest;
use App\Entity\Contest\ContestContestant;
use App\Entity\Contest\ContestWinner;
use App\Entity\Contestant\Contestant;
use App\Entity\Round\Round;
use App\Entity\Round\RoundContestantScore;
use App\Entity\Round\RoundJudgeScore;
use App\Repository\Round\RoundRepository;
use App\Service\Contest\ContestService;
use App\Service\Genre\GenreService;
use App\Service\Judge\JudgeService;
use Doctrine\ORM\EntityManagerInterface;

class RoundService
{
    const MIN_MULTIPLIER_SCORE = 0.1;
    const MAX_MULTIPLIER_SCORE = 10.0;
    const PRECISION = 1; // number of digits after the decimal point
    const CHANGE_TO_BEING_SICK_PERCENTAGE = 5;
    /**
     * @var GenreService
     */
    private $genreService;
    /**
     * @var ContestGenreRepository
     */
    private $contestGenreRepository;
    /**
     * @var RoundRepository
     */
    private $roundRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ContestService
     */
    private $contestService;
    /**
     * @var JudgeService
     */
    private $judgeService;

    /**
     * RoundService constructor.
     * @param EntityManagerInterface $entityManager
     * @param GenreService $genreService
     * @param RoundRepository $roundRepository
     * @param JudgeService $judgeService
     */
    public function __construct(EntityManagerInterface $entityManager,
                                GenreService $genreService,
                                RoundRepository $roundRepository,
                                JudgeService $judgeService
                                )
    {
        $this->genreService = $genreService;
        $this->roundRepository = $roundRepository;
        $this->entityManager = $entityManager;
        $this->judgeService = $judgeService;
    }

    public function createRounds(Contest $contest)
    {
        $genres = $this->genreService->getAllGenresRandomOrder();
        foreach ($genres as $genre) {
            $round = new Round();
            $round->setContest($contest);
            $round->setGenre($genre);
            $round->setIsCompleted(0);
            $this->entityManager->persist($round);
        }
        $this->entityManager->flush();
        $this->startNextRound($contest);
    }

    public function startNextRound(Contest $contest)
    {
        /** @var Round $round */

        $round = $this->getNextRound($contest);
        if ($round) {
            // there is still round to complete

            $this->setContestantRoundScore($round);
            $this->setJudgePoint($round, $contest->getJudges());
            $round->setIsCompleted(true);
            $this->entityManager->persist($round);
            $this->entityManager->flush();

            // check if there is rounds left to run
            if (!$this->getNextRound($contest)) {
                // All rounds are completed
                $this->completeContest($contest);
                //$this->contestService->completeContest($contest);

            }
        }
    }

    private function setContestantRoundScore(Round $round)
    {

        /** @var ContestContestant $contestContestant */
        foreach ($round->getContest()->getContestants() as $contestContestant) {

            $this->changeToGetSick($contestContestant->getContestant());
            foreach ($contestContestant->getContestant()->getScore() as $score) {
                if ($round->getGenre() === $score->getGenre()) {
                    $roundScore = new RoundContestantScore();
                    $roundScore->setRound($round);
                    $roundScore->setContestant($contestContestant->getContestant());
                    if ($contestContestant->getContestant()->getIsSick()) {


                        $roundScore->setScore(
                        // or simply add 0.05 points to round up
                            round(
                                $score->getScore() * $this->getScoreMultiplier() / 2,
                                1,
                                PHP_ROUND_HALF_UP
                            )
                        );
                    } else {
                        $roundScore->setScore($score->getScore() * $this->getScoreMultiplier());

                    }
                    $this->entityManager->persist($roundScore);
                    $round->addContesttantScore($roundScore);
                }

            }
        }

        $this->entityManager->flush();


    }

    private function changeToGetSick(Contestant $contestant)
    {
        if (self::CHANGE_TO_BEING_SICK_PERCENTAGE >= rand(1, 100)) {
            $contestant->setIsSick(1);
            $this->entityManager->flush($contestant);

        } else {
            $contestant->setIsSick(0);
        }
        //record sickness status to db
        $this->entityManager->flush();

    }

    private function getScoreMultiplier()
    {
        $scale = pow(10, self::PRECISION);
        return rand(self::MIN_MULTIPLIER_SCORE * $scale, self::MAX_MULTIPLIER_SCORE * $scale) / $scale;
    }

    private function setJudgePoint(Round $round)
    {

        $judges = $round->getContest()->getJudges();

        foreach ($judges as $judge) {
            foreach ($round->getContestantScores() as $contestantScore) {
                if ($contestantScore->getRound()->getGenre() === $round->getGenre()) {
                    $roundJudgeScore = new RoundJudgeScore();
                    $roundJudgeScore->setScore($judge->getJudge()->scoring($contestantScore));
                    $roundJudgeScore->setJudge($judge->getJudge());
                    $roundJudgeScore->setContestant($contestantScore->getContestant());
                    $this->entityManager->persist($roundJudgeScore);

                    $round->addRoundJudgeScore($roundJudgeScore);


                    //$this->updateContestantTotalScore($contestantScore->getContestant(), $roundJudgeScore);

                }

            }

        }
        $this->entityManager->flush();

    }


    private function getNextRound(Contest $contest)
    {
        return $this->roundRepository->getNextRoundGenre($contest);

    }

    public function completeContest(Contest $contest)
    {
        $contest->setIsCompleted(true);
        $this->entityManager->persist($contest);
        $this->entityManager->flush();
        $this->setWinner($contest);

    }

    public function setWinner(Contest $contest){
        $winners[] = array(
            "score" => 0,
            "winner" => null
        );

        /** @var ContestContestant $contestant */
        foreach ($contest->getContestants() as $contestContestant){

            $rank = array(
                'score' => $this->judgeService->getTotalPointOfContestant($contestContestant->getContestant()),
                'contestant' => $contestContestant->getContestant()
            );

            if($winners[0]['score'] < $rank['score']){
                //delete previous best scores, there is a better one
                unset($winners);
                $winners[] = $rank;
            }else if($winners[0] == $rank['score']){
                // if we have winner more then one
                $winners[] = $rank;
            }

        }


        foreach($winners as $winner){
            $contestWinner = new ContestWinner();
            $contestWinner->setContestant($winner['contestant']);
            $contestWinner->setTotalScore($winner['score']);
            $contest->addWinner($contestWinner);
            $this->entityManager->persist($contestWinner);
            $this->entityManager->persist($contest);
        }

        $this->entityManager->flush();

    }



}