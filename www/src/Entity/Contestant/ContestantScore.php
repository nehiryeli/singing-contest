<?php

namespace App\Entity\Contestant;

use App\Entity\Contestant\Contestant;
use App\Entity\Genre\Genre;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant", inversedBy="score")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre\Genre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContestant(): ?Contestant
    {
        return $this->contestant;
    }

    public function setContestant(?Contestant $contestant): self
    {
        $this->contestant = $contestant;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

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
