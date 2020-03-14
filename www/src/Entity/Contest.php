<?php

namespace App\Entity;

use App\Entity\Contest\ContestContestant;
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

    public function __construct()
    {
        $this->contestants = new ArrayCollection();
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
            $contestant->setContestId($this);
        }

        return $this;
    }

    public function removeContestant(ContestContestant $contestant): self
    {
        if ($this->contestants->contains($contestant)) {
            $this->contestants->removeElement($contestant);
            // set the owning side to null (unless already changed)
            if ($contestant->getContestId() === $this) {
                $contestant->setContestId(null);
            }
        }

        return $this;
    }
}
