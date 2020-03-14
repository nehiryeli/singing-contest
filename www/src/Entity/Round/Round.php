<?php

namespace App\Entity\Round;

use App\Entity\Contest;
use App\Entity\Genre;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Round\RoundRepository")
 */
class Round
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contest", inversedBy="rounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genreId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContestId(): ?Contest
    {
        return $this->contestId;
    }

    public function setContestId(?Contest $contestId): self
    {
        $this->contestId = $contestId;

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
}
