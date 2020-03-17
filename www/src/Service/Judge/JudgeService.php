<?php


namespace App\Service\Judge;


use App\Entity\Contestant\Contestant;
use App\Entity\Judge\Judge;
use App\Entity\Judge\JudgeCategory;
use App\Entity\Judge\MeanJudge;
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
     * @param RoundJudgeScoreRepository $roundJudgeScoreRepository
     */
    public function __construct(EntityManagerInterface $entityManager, RoundJudgeScoreRepository $roundJudgeScoreRepository)
    {
        $this->entityManager = $entityManager;
        $this->roundJudgeScoreRepository = $roundJudgeScoreRepository;

    }

    public function createJudges()
    {
        $judges =  new ArrayCollection();

        // loop NUMBER_OF_JUDGES times
        foreach(range(1, self::NUMBER_OF_JUDGES) as $index){

            // Get random judge type from JUDGE_TYPES and concatenate it with JUDGE_NAMESPACE
            $judgeClass = self::JUDGE_NAMESPACE.$this->getRandomType();
            $judge =  new $judgeClass;

            $this->entityManager->persist($judge);
            $judges[] = $judge;
        }
        $this->entityManager->flush();
        return $judges;
    }


    private function getRandomType()
    {
        // return random single judge type
        return  self::JUDGE_TYPES[rand(0, count(self::JUDGE_TYPES)-1)];
    }

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