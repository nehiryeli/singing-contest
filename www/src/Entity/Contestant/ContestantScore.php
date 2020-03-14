<?php

namespace App\Entity\Contestant;

use App\Entity\Contestant;
use App\Entity\Genre;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Contestant\ContestantScoreRepository")
 */
class ContestantScore
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant", inversedBy="score")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestantId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genreId;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContestantId(): ?Contestant
    {
        return $this->contestantId;
    }

    public function setContestantId(?Contestant $contestantId): self
    {
        $this->contestantId = $contestantId;

        return $this;
    }

    public function getGenreId(): ?Genre
    {
        return $this->genreId;
    }

    public function setGenreId(?Genre $genreId): self
    {
        $this->genreId = $genreId;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }
}
