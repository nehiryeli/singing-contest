<?php

namespace App\Entity\Round;

use App\Entity\Contest\Contest;
use App\Entity\Genre\Genre;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Contest\Contest", inversedBy="rounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contest;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Round\RoundContestantScore", mappedBy="round", orphanRemoval=true)
     */
    private $contestantScores;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Round\RoundJudgeScore", mappedBy="round", orphanRemoval=true)
     */
    private $roundJudgeScores;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCompleted;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre\Genre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;



    public function __construct()
    {
        $this->contestantScores = new ArrayCollection();
        $this->roundJudgeScores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContest(): ?Contest
    {
        return $this->contest;
    }

    public function setContest(?Contest $contest): self
    {
        $this->contest = $contest;

        return $this;
    }



    /**
     * @return Collection|RoundContestantScore[]
     */
    public function getContestantScores(): Collection
    {
        return $this->contestantScores;
    }

    public function addContesttantScore(RoundContestantScore $contesttantScore): self
    {
        if (!$this->contestantScores->contains($contesttantScore)) {
            $this->contestantScores[] = $contesttantScore;
            $contesttantScore->setRound($this);
        }

        return $this;
    }

    public function removeContesttantScore(RoundContestantScore $contesttantScore): self
    {
        if ($this->contestantScores->contains($contesttantScore)) {
            $this->contestantScores->removeElement($contesttantScore);
            // set the owning side to null (unless already changed)
            if ($contesttantScore->getRound() === $this) {
                $contesttantScore->setRound(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RoundJudgeScore[]
     */
    public function getRoundJudgeScores(): Collection
    {
        return $this->roundJudgeScores;
    }

    public function addRoundJudgeScore(RoundJudgeScore $roundJudgeScore): self
    {
        if (!$this->roundJudgeScores->contains($roundJudgeScore)) {
            $this->roundJudgeScores[] = $roundJudgeScore;
            $roundJudgeScore->setRound($this);
        }

        return $this;
    }

    public function removeRoundJudgeScore(RoundJudgeScore $roundJudgeScore): self
    {
        if ($this->roundJudgeScores->contains($roundJudgeScore)) {
            $this->roundJudgeScores->removeElement($roundJudgeScore);
            // set the owning side to null (unless already changed)
            if ($roundJudgeScore->getRound() === $this) {
                $roundJudgeScore->setRound(null);
            }
        }

        return $this;
    }

    public function getIsCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setIsCompleted(?bool $isCompleted): self
    {
        $this->isCompleted = $isCompleted;

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


}
