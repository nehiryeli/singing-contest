<?php

namespace App\Entity\Round;

use App\Entity\Contestant\Contestant;
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
    private $round;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Judge\Judge", inversedBy="roundJudgeScores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $judge;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getJudge(): ?Judge
    {
        return $this->judge;
    }

    public function setJudge(?Judge $judge): self
    {
        $this->judge = $judge;

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

    public function getContestant(): ?Contestant
    {
        return $this->contestant;
    }

    public function setContestant(?Contestant $contestant): self
    {
        $this->contestant = $contestant;

        return $this;
    }
}
