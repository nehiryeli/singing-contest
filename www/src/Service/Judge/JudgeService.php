<?php


namespace App\Service\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Round\RoundJudgeScore;
use App\Repository\Judge\JudgeRepository;
use App\Repository\Round\RoundJudgeScoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class JudgeService
{
    const NUMBER_OF_JUDGES = 3; // Number of judges for each contest
    const JUDGE_NAMESPACE = "App\Entity\Judge\\";
    const JUDGE_TYPES = array(
        'RandomJudge',
        'HonestJudge',
        'MeanJudge',
        'RockJudge',
        'FriendlyJudge'
    );

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var JudgeRepository
     */
    private $judgeRepository;
    /**
     * @var RoundJudgeScoreRepository
     */
    private $roundJudgeScoreRepository;

    /**
     * JudgeService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->roundJudgeScoreRepository = $this->entityManager->getRepository(RoundJudgeScore::class);

    }

    /**
     * Create random number of NUMBER_OF_JUDGES judges, inserts db and returns
     * @return ArrayCollection
     */
    public function createJudges()
    {
        $judges =  new ArrayCollection();

        // loop NUMBER_OF_JUDGES times
        foreach(range(1, self::NUMBER_OF_JUDGES) as $index){

            // Get random judge type from JUDGE_TYPES const and concatenate it with JUDGE_NAMESPACE to create object
            $judgeClass = self::JUDGE_NAMESPACE.$this->getRandomType();
            $judge =  new $judgeClass;

            $this->entityManager->persist($judge);
            $judges->add($judge);
        }
        $this->entityManager->flush();
        return $judges;
    }

    /**
     * Returns single random judge type from JUDGE_TYPES const
     * @return mixed
     */
    private function getRandomType()
    {
        // return random single judge type
        return  self::JUDGE_TYPES[rand(0, count(self::JUDGE_TYPES)-1)];
    }

    /**
     * Returns contestant's total score in a contest
     * @param Contestant $contestant
     * @return int
     */
    public function getTotalPointOfContestant(Contestant $contestant) : int
    {

        $rounds = $this->roundJudgeScoreRepository->findBy(array('contestant' => $contestant));
        /** @var RoundJudgeScore $round */
        $total = 0;
        foreach($rounds as $round){
            $total += $round->getScore();
        }

        return $total;

    }


}