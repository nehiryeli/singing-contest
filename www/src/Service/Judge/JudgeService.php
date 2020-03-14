<?php


namespace App\Service\Judge;


use App\Entity\Judge\Judge;
use App\Entity\Judge\JudgeCategory;
use App\Repository\Judge\JudgeRepository;
use Doctrine\ORM\EntityManagerInterface;

class JudgeService
{
    const NUMBER_OF_JUDGES = 3; // Number of judges for each contest
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var JudgeRepository
     */
    private $judgeRepository;

    /**
     * JudgeService constructor.
     * @param EntityManagerInterface $entityManager
     * @param JudgeRepository $judgeRepository
     */
    public function __construct(EntityManagerInterface $entityManager, JudgeRepository $judgeRepository)
    {
        $this->entityManager = $entityManager;
        $this->judgeRepository = $judgeRepository;

    }

    public function createJudges()
    {
        $judges =  array();
        // loop NUMBER_OF_JUDGES times
        foreach(range(1, self::NUMBER_OF_JUDGES) as $index){
            $judge = new Judge();
            $judge->setCategoryId($this->getRandomCategory());
            $this->entityManager->persist($judge);
            $judges[] = $judge;
        }
        $this->entityManager->flush();
        return $judges;
    }



    public function getJudgeCategories()
    {
        $judgeCategoryRepository = $this->entityManager->getRepository(JudgeCategory::class);
        return $judgeCategoryRepository->findAll();

    }

    public function getRandomCategory()
    {
        $judgeCategoryRepository = $this->entityManager->getRepository(JudgeCategory::class);
        $judgeCategories = $judgeCategoryRepository->findAll();

        // return random judge categories from the judge categories
        return  $judgeCategories[rand(0, count($judgeCategories)-1)];
    }


}