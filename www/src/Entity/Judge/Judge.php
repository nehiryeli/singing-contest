<?php

namespace App\Entity\Judge;

use App\Entity\Round\RoundJudgeScore;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Judge\JudgeRepository")
 */
class Judge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Judge\JudgeCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Round\RoundJudgeScore", mappedBy="judgeId", orphanRemoval=true)
     */
    private $roundJudgeScores;

    public function __construct()
    {
        $this->roundJudgeScores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryId(): ?JudgeCategory
    {
        return $this->category_id;
    }

    public function setCategoryId(?JudgeCategory $category_id): self
    {
        $this->category_id = $category_id;

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
            $roundJudgeScore->setJudgeId($this);
        }

        return $this;
    }

    public function removeRoundJudgeScore(RoundJudgeScore $roundJudgeScore): self
    {
        if ($this->roundJudgeScores->contains($roundJudgeScore)) {
            $this->roundJudgeScores->removeElement($roundJudgeScore);
            // set the owning side to null (unless already changed)
            if ($roundJudgeScore->getJudgeId() === $this) {
                $roundJudgeScore->setJudgeId(null);
            }
        }

        return $this;
    }
}
