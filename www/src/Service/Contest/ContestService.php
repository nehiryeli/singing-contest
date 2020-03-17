<?php


namespace App\Service\Contest;


use App\Entity\Contest\Contest;
use App\Entity\Contest\ContestContestant;
use App\Entity\Contest\ContestJudges;
use App\Entity\Contest\ContestWinner;
use App\Entity\Contestant\Contestant;
use App\Entity\Round\Round;
use App\Service\Contestant\ContestantService;
use App\Service\Genre\GenreService;
use App\Service\Judge\JudgeService;
use App\Service\Round\RoundService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class ContestService
{
    const NUMBER_OF_CONTESTANT = 10; //  number of contestants for each contest
    private $entityManager;
    private $contestRepository;
    /**
     * @var ContestantService
     */
    private $contestantService;
    /**
     * @var JudgeService
     */
    private $judgeService;
    /**
     * @var GenreService
     */
    private $genreService;
    private $contest;
    /**
     * @var RoundService
     */
    private $roundService;

    /**
     * ContestGenerator constructor.
     * @param EntityManagerInterface $entityManager
     * @param ContestantService $contestantService
     * @param JudgeService $judgeService
     * @param GenreService $genreService
     * @param RoundService $roundService
     */
    public function __construct(EntityManagerInterface $entityManager,
                                ContestantService $contestantService,
                                JudgeService $judgeService,
                                GenreService $genreService,
                                RoundService $roundService
    )
    {
        $this->entityManager = $entityManager;
        $this->contestRepository = $this->entityManager->getRepository(Contest::class);
        $this->contestantService = $contestantService;
        $this->judgeService = $judgeService;
        $this->genreService = $genreService;
        $this->roundService = $roundService;

    }


    public function startContest()
    {
        /*
         * Step 1: Create contest if not concurrent exist
         * Step 2: Create contestants
         * Step 3: Create judges
         * Step 4: Assign contestants to contest
         * Step 5: Assign judges to contest
         * Step 6: Set genres for rounds
         * Step 7: Start rounds
         */


        /* STEP 1 Crate Contest */
        try {
            $this->contest = $this->createContest();
        } catch (\Exception $e) {
            dd($e);
            // TODO: Log the exception
        }

        /* STEP 2 Create contestants */
        $contestants = $this->contestantService->createContestants();

        /* STEP 3 Create Judge */
        $judges = $this->judgeService->createJudges();

        /* STEP 4 Assign contestants to contest */
        $this->assignContestants($this->contest, $contestants);

        /* STEP 5 Assign judge to contest */
        $this->assignJudge($this->contest, $judges);

        /* STEP 6 Set Genres for rounds */
        $this->setRoundGenres();

        /*STEP 7 Start Next Round  */
        $this->startNextRound();

        return $this->contest;
    }


    private function createContest(){
        // check if there is active contests
        if(!$this->contestRepository->getUncompletedContest()){

            // create new contest
            $contest = new Contest();
            $contest->setIsCompleted(0);

            // generate sql
            $this->entityManager->persist($contest);

            // record to db
            $this->entityManager->flush();

            return $contest;
        }else{
            // trying to create more than one contest at a time
            throw new \Exception("Only one singing contest can be at a time ");

        }
    }

    private function assignContestants(Contest $contest, $contestants)
    {
        foreach($contestants as $contestant){
            $contestContestant = new ContestContestant();
            $contestContestant->setContest($contest);
            $contestContestant->setContestant($contestant);

            // generate db entry
            $this->entityManager->persist($contestContestant);

            $contest->addContestant($contestContestant);
        }
        // record all updates to db
        $this->entityManager->flush();
    }

    private function assignJudge(Contest $contest, $judges)
    {
        foreach($judges as $judge){
            $contestJudge = new ContestJudges();
            $contestJudge->setContest($contest);
            $contestJudge->setJudge($judge);

            $contest->addJudge($contestJudge);
            // generate db entry
            $this->entityManager->persist($contestJudge);
        }

        // record all updates to db
        $this->entityManager->flush();
    }

    private function setRoundGenres()
    {
        $genres = $this->genreService->getAllGenresRandomOrder();

        foreach($genres as $index => $genre){
            $round = new Round();
            $round->setContest($this->contest);
            $round->setGenre($genre);
            $round->setIsCompleted(0);

            $this->entityManager->persist($round);
        }

        $this->entityManager->flush();

    }

    private function startNextRound()
    {
        $this->roundService->startNextRound($this->contest);
    }


    public function getActiveContest()
    {
        return $this->contestRepository->getUncompletedContest();
    }



    public function getProgressOfActiveContest()
    {
        $contest = $this->getActiveContest();
        $numberOfCompletedRounds = 0;
        /** @var Round $round */
        foreach($contest->getRounds() as $round){

            $numberOfCompletedRounds+= $round->getIsCompleted() ? 1 : 0;

        }

        $round = array(
            'currentRound'  => $numberOfCompletedRounds,
            'totalRounds' => count($contest->getRounds()),
        );
        return $round;
    }

    public function getScores(Contest $contest)
    {
        $ranking = new ArrayCollection();
        /** @var ContestContestant $contestContestant */
        foreach ($contest->getContestants() as $contestContestant){
            $ranking[] = [
                'contestant' => $contestContestant->getContestant(),
                'score' => $this->judgeService->getTotalPointOfContestant($contestContestant->getContestant())
            ];
        }
        return $ranking;
    }

    public function getAllTimesBestScoreContest()
    {
        $contestWinnerRepository = $this->entityManager->getRepository(ContestWinner::class);
        return $contestWinnerRepository->getAllTimeBestContest();

    }


}