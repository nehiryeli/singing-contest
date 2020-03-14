<?php

namespace App\Entity\Round;

use App\Entity\Judge\Judge;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Round\RoundJudgeScoreRepository")
 */
class RoundJudgeScore
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Round\Round", inversedBy="roundJudgeScores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $roundId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Judge\Judge", inversedBy="roundJudgeScores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $judgeId;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoundId(): ?Round
    {
        return $this->roundId;
    }

    public function setRoundId(?Round $roundId): self
    {
        $this->roundId = $roundId;

        return $this;
    }

    public function getJudgeId(): ?Judge
    {
        return $this->judgeId;
    }

    public function setJudgeId(?Judge $judgeId): self
    {
        $this->judgeId = $judgeId;

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
