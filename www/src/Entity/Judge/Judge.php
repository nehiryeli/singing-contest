<?php

namespace App\Entity\Judge;

use App\Entity\Round\RoundJudgeScore;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Judge\JudgeRepository")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "judge" = "Judge",
 *     "meanJudge" = "MeanJudge",
 *     "honestJudge" = "HonestJudge"
 * })
 */
class Judge implements JudgeInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;
    

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

    public function getCategory(): ?JudgeCategory
    {
        return $this->category;
    }

    public function setCategory(?JudgeCategory $category): self
    {
        $this->category = $category;

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
            $roundJudgeScore->setJudge($this);
        }

        return $this;
    }

    public function removeRoundJudgeScore(RoundJudgeScore $roundJudgeScore): self
    {
        if ($this->roundJudgeScores->contains($roundJudgeScore)) {
            $this->roundJudgeScores->removeElement($roundJudgeScore);
            // set the owning side to null (unless already changed)
            if ($roundJudgeScore->getJudge() === $this) {
                $roundJudgeScore->setJudge(null);
            }
        }

        return $this;
    }



    /**
     * Each Judge has their own calculation method based on their category
     * @return mixed
     */
    public function scoring()
    {
        // TODO: Implement scoring() method.
    }
}
