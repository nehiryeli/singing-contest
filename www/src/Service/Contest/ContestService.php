<?php


namespace App\Service\Contest;


use App\Entity\Contest\Contest;
use App\Entity\Contest\ContestContestant;
use App\Entity\Contest\ContestJudges;
use App\Entity\Contestant\Contestant;
use App\Entity\Contestant\ContestantScore;
use App\Service\Contestant\ContestantService;
use App\Service\Genre\GenreService;
use App\Repository\Contest\ContestRepository;
use App\Service\Judge\JudgeService;
use Doctrine\ORM\EntityManagerInterface;

class ContestService
{
    const NUMBER_OF_CONTESTANT = 10; //  number of contestants for each contest
    private $entityManager;
    private $contestRepo;
    /**
     * @var ContestantService
     */
    private $contestantService;
    /**
     * @var JudgeService
     */
    private $judgeService;

    /**
     * ContestGenerator constructor.
     * @param EntityManagerInterface $entityManager
     * @param ContestRepository $contestRepo
     * @param ContestantService $contestantService
     * @param JudgeService $judgeService
     */
    public function __construct(EntityManagerInterface $entityManager,
                                ContestRepository $contestRepo,
                                ContestantService $contestantService,
                                judgeService $judgeService)
    {
        $this->entityManager = $entityManager;
        $this->contestRepo = $contestRepo;
        $this->contestantService = $contestantService;
        $this->judgeService = $judgeService;
    }


    public function startContest()
    {
        /*
         * Step 1: Create contest if not concurrent exist
         * Step 2: Create contestants
         * Step 3: Create judges
         * Step 4: Assign contestants to contest
         * Step 5: Assign judges to contest
         *
         */


        /* STEP 1 Crate Contest */
        try {
            $contest = $this->createContest();
        } catch (\Exception $e) {
            dd($e);
            // TODO: Log exception
        }

        /* STEP 2 Create contestants */
        $contestants = $this->contestantService->createContestants();


        /* STEP 3 Create Judge */
        $judges = $this->judgeService->createJudges();

        /* STEP 4 Assign contestants to contest */
        $this->assignContestants($contest, $contestants);

        /* STEP 5 Assign judge to contest */
        $this->assignJudge($contest, $judges);


    }


    private function createContest(){
        // check if there is active contests
        if(count($this->contestRepo->getUncompletedContests()) == 0){
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

    public function assignContestants(Contest $contest, Array $contestants)
    {
        foreach($contestants as $contestant){
            $contestContestant = new ContestContestant();
            $contestContestant->setContestId($contest);
            $contestContestant->setContestantId($contestant);

            // generate db entry
            $this->entityManager->persist($contestContestant);
        }
        // record all updates to db
        $this->entityManager->flush();
    }

    public function assignJudge(Contest $contest, $judges)
    {
        foreach($judges as $judge){
            $contestJudge = new ContestJudges();
            $contestJudge->setContestId($contest);
            $contestJudge->setJudgeId($judge);

            // generate db entry
            $this->entityManager->persist($contestJudge);
        }

        // record all updates to db
        $this->entityManager->flush();
    }


}