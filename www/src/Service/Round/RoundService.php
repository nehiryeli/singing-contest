<?php


namespace App\Service\Round;


use App\Entity\Contest\Contest;
use App\Entity\Genre\Genre;
use App\Entity\Round\Round;
use App\Service\Genre\GenreService;

class RoundService
{
    /**
     * @var GenreService
     */
    private $genreService;

    /**
     * RoundService constructor.
     * @param GenreService $genreService
     */
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;

    }
    public function createRound(Contest $contest)
    {
        $round = new Round();
        $round->setContestId($contest);
        $round->setGenreId()
        dd($this->genreService->getAllGenresRandomOrder());


    }
}