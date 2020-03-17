<?php


namespace App\Service\Contestant;


use App\Entity\Contest\Contest;
use App\Entity\Contestant\Contestant;
use App\Entity\Contestant\ContestantScore;
use App\Repository\Contest\ContestRepository;
use App\Service\Genre\GenreService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class ContestantService
{
    const NUMBER_OF_CONTESTANT = 10; //  number of contestants for each contest
    const MIN_SKILL_SCORE = 1; // minimum skill score of contestant for each genre
    const MAX_SKILL_SCORE = 10; // maximum skill score of contestant for each genre
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ContestRepository
     */
    private $contestRepository;
    /**
     * @var GenreService
     */
    private $genreService;

    public function __construct(EntityManagerInterface $entityManager, GenreService $genreService )
    {
        $this->entityManager = $entityManager;
        $this->contestRepository = $this->entityManager->getRepository(Contest::class);
        $this->genreService = $genreService;

    }

    /**
     * Creates number of NUMBER_OF_CONTESTANT random contestants records to db and returns them
     * @return ArrayCollection
     */
    public function createContestants()
    {
        $contestants = new ArrayCollection();
        // loop NUMBER_OF_CONTESTANT times
        foreach(range(1, self::NUMBER_OF_CONTESTANT) as $index){

            $contestant = new Contestant();
            $contestant->setIsSick(0);

            $this->entityManager->persist($contestant);
            $this->entityManager->flush();

            // Set skill point for each genres for contestant
            $this->setPointsForContestant($contestant);
            $contestants->add($contestant);

        }
        return $contestants;
    }

    /**
     * Sets skill point for each genres for provided contestant
     * @param Contestant $contestant
     */
    public function setPointsForContestant(Contestant $contestant)
    {
        $genres = $this->genreService->getAllGenres();
        foreach ($genres as $genre){
            $contestantScore = new ContestantScore();
            $contestantScore->setGenre($genre);
            $contestantScore->setScore(rand(self::MIN_SKILL_SCORE, self::MAX_SKILL_SCORE));
            $contestant->addScore($contestantScore);

            $this->entityManager->persist($contestantScore);
            $this->entityManager->flush();

        }
    }
}