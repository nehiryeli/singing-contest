<?php

namespace App\Entity\Round;

use App\Entity\Contestant\Contestant;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Round\RoundContestantScoreRepository")
 */
class RoundContestantScore
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Round\Round", inversedBy="contesttantScores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $round;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant", inversedBy="roundScore")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestant;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=1)
     */
    private $score;

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

    public function getContestant(): ?Contestant
    {
        return $this->contestant;
    }

    public function setContestant(?Contestant $contestant): self
    {
        $this->contestant = $contestant;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }
}
