<?php

namespace App\Entity\Contest;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Contest\Contest", inversedBy="judges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contest;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Judge\Judge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $judge;

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

    public function getJudge(): ?Judge
    {
        return $this->judge;
    }

    public function setJudge(?Judge $judge): self
    {
        $this->judge = $judge;

        return $this;
    }
}
