<?php

namespace App\Entity\Contest;

use App\Entity\Contest;
use App\Entity\Judge\Judge;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Contest\ContestJudgesRepository")
 */
class ContestJudges
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contest", inversedBy="judges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Judge\Judge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $judgeId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContestId(): ?Contest
    {
        return $this->contestId;
    }

    public function setContestId(?Contest $contestId): self
    {
        $this->contestId = $contestId;

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
}
