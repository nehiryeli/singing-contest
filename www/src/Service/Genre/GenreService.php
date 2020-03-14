<?php


namespace App\Service\Genre;


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
     * @param GenreRepository $genreRepository
     */
    public function __construct(EntityManagerInterface $entityManager, GenreRepository $genreRepository)
    {
        $this->entityManager = $entityManager;
        $this->genreRepository = $genreRepository;
    }

    public function getAllGenres()
    {
        return $this->genreRepository->findAll();
    }

    public function getRandomGenre()
    {
        $genres = $this->getAllGenres();
        if($genres){
            // return random genre from all genres
            return $genres[rand(0, count($genres) -1)];
        }
        return null;

    }
}