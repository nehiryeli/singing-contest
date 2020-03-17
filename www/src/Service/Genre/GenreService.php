<?php


namespace App\Service\Genre;


use App\Entity\Genre\Genre;
use App\Repository\Genre\GenreRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class GenreService
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var GenreRepository
     */
    private $genreRepository;

    /**
     * Genre constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->genreRepository = $this->entityManager->getRepository(Genre::class);

    }

    /**
     * Returns all genres on DB
     * @return Genre[]|array|object[]
     */
    public function getAllGenres()
    {
        return $this->genreRepository->findAll();
    }

    /**
     * Returns all genres on DB in random order
     * @return Genre[]|array|object[]
     */
    public function getAllGenresRandomOrder(){
        $genres = $this->getAllGenres();
        shuffle($genres);
        return $genres;
    }

    /**
     * Returns single random genre
     * @return Genre
     */
    public function getRandomGenre()
    {
        $genres = $this->getAllGenresRandomOrder();
        return reset($genres);

    }
}