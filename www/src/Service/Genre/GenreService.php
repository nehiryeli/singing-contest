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

    public function getAllGenresRandomOrder(){
        $genres = $this->getAllGenres();
        shuffle($genres);
        return $genres;
    }

    public function getRandomGenre()
    {
        $genres = $this->getAllGenresRandomOrder();
        return reset($genres);


    }
}