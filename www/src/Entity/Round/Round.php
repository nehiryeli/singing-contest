<?php

namespace App\Entity\Round;

use App\Entity\Contest;
use App\Entity\Genre;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Round\RoundContestantScore", mappedBy="roundId", orphanRemoval=true)
     */
    private $contesttantScores;

    public function __construct()
    {
        $this->contesttantScores = new ArrayCollection();
    }

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

    /**
     * @return Collection|RoundContestantScore[]
     */
    public function getContesttantScores(): Collection
    {
        return $this->contesttantScores;
    }

    public function addContesttantScore(RoundContestantScore $contesttantScore): self
    {
        if (!$this->contesttantScores->contains($contesttantScore)) {
            $this->contesttantScores[] = $contesttantScore;
            $contesttantScore->setRoundId($this);
        }

        return $this;
    }

    public function removeContesttantScore(RoundContestantScore $contesttantScore): self
    {
        if ($this->contesttantScores->contains($contesttantScore)) {
            $this->contesttantScores->removeElement($contesttantScore);
            // set the owning side to null (unless already changed)
            if ($contesttantScore->getRoundId() === $this) {
                $contesttantScore->setRoundId(null);
            }
        }

        return $this;
    }
}
