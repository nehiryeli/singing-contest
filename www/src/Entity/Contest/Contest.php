<?php

namespace App\Entity\Contest;


use App\Entity\Contest\ContestContestant;
use App\Entity\Contest\ContestJudges;
use App\Entity\Round\Round;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContestRepository")
 */
class Contest
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
    private $isCompleted;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contest\ContestContestant", mappedBy="contestId", orphanRemoval=true)
     */
    private $contestants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contest\ContestJudges", mappedBy="contestId", orphanRemoval=true)
     */
    private $judges;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Round\Round", mappedBy="contestId", orphanRemoval=true)
     */
    private $rounds;



    public function __construct()
    {
        $this->contestants = new ArrayCollection();
        $this->judges = new ArrayCollection();
        $this->rounds = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|ContestContestant[]
     */
    public function getContestants(): Collection
    {
        return $this->contestants;
    }

    public function addContestant(ContestContestant $contestant): self
    {
        if (!$this->contestants->contains($contestant)) {
            $this->contestants[] = $contestant;
            $contestant->setContest($this);
        }

        return $this;
    }

    public function removeContestant(ContestContestant $contestant): self
    {
        if ($this->contestants->contains($contestant)) {
            $this->contestants->removeElement($contestant);
            // set the owning side to null (unless already changed)
            if ($contestant->getContest() === $this) {
                $contestant->setContest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContestJudges[]
     */
    public function getJudges(): Collection
    {
        return $this->judges;
    }

    public function addJudge(ContestJudges $judge): self
    {
        if (!$this->judges->contains($judge)) {
            $this->judges[] = $judge;
            $judge->setContest($this);
        }

        return $this;
    }

    public function removeJudge(ContestJudges $judge): self
    {
        if ($this->judges->contains($judge)) {
            $this->judges->removeElement($judge);
            // set the owning side to null (unless already changed)
            if ($judge->getContest() === $this) {
                $judge->setContest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Round[]
     */
    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function addRound(Round $round): self
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds[] = $round;
            $round->setContest($this);
        }

        return $this;
    }

    public function removeRound(Round $round): self
    {
        if ($this->rounds->contains($round)) {
            $this->rounds->removeElement($round);
            // set the owning side to null (unless already changed)
            if ($round->getContest() === $this) {
                $round->setContest(null);
            }
        }

        return $this;
    }


}
