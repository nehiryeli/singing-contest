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
    private $roundId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant", inversedBy="roundScore")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestantId;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=1)
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

    public function getContestantId(): ?Contestant
    {
        return $this->contestantId;
    }

    public function setContestantId(?Contestant $contestantId): self
    {
        $this->contestantId = $contestantId;

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
