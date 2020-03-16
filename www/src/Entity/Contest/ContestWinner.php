<?php

namespace App\Entity\Contest;

use App\Entity\Contestant\Contestant;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Contest\ContestWinnerRepository")
 */
class ContestWinner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contest\Contest", inversedBy="winner")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contest;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant", inversedBy="winner")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestant;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalScore;

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

    public function getContestant(): ?Contestant
    {
        return $this->contestant;
    }

    public function setContestant(?Contestant $contestant): self
    {
        $this->contestant = $contestant;

        return $this;
    }

    public function getTotalScore(): ?int
    {
        return $this->totalScore;
    }

    public function setTotalScore(int $totalScore): self
    {
        $this->totalScore = $totalScore;

        return $this;
    }
}
