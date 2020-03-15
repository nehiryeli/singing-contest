<?php

namespace App\Entity\Contestant;

use App\Entity\Contestant\ContestantScore;
use App\Entity\Round\RoundContestantScore;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContestantRepository")
 */
class Contestant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSick;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contestant\ContestantScore", mappedBy="contestantId", orphanRemoval=true)
     */
    private $score;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Round\RoundContestantScore", mappedBy="contestantId", orphanRemoval=true)
     */
    private $roundScore;

    public function __construct()
    {
        $this->score = new ArrayCollection();
        $this->roundScore = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsSick(): ?bool
    {
        return $this->isSick;
    }

    public function setIsSick(?bool $isSick): self
    {
        $this->isSick = $isSick;

        return $this;
    }

    /**
     * @return Collection|ContestantScore[]
     */
    public function getScore(): Collection
    {
        return $this->score;
    }

    public function addScore(ContestantScore $score): self
    {
        if (!$this->score->contains($score)) {
            $this->score[] = $score;
            $score->setContestant($this);
        }

        return $this;
    }

    public function removeScore(ContestantScore $score): self
    {
        if ($this->score->contains($score)) {
            $this->score->removeElement($score);
            // set the owning side to null (unless already changed)
            if ($score->getContestant() === $this) {
                $score->setContestant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RoundContestantScore[]
     */
    public function getRoundScore(): Collection
    {
        return $this->roundScore;
    }

    public function addRoundScore(RoundContestantScore $roundScore): self
    {
        if (!$this->roundScore->contains($roundScore)) {
            $this->roundScore[] = $roundScore;
            $roundScore->setContestant($this);
        }

        return $this;
    }

    public function removeRoundScore(RoundContestantScore $roundScore): self
    {
        if ($this->roundScore->contains($roundScore)) {
            $this->roundScore->removeElement($roundScore);
            // set the owning side to null (unless already changed)
            if ($roundScore->getContestant() === $this) {
                $roundScore->setContestant(null);
            }
        }

        return $this;
    }
}
