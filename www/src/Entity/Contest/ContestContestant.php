<?php

namespace App\Entity\Contest;

use App\Entity\Contest;
use App\Entity\Contestant\Contestant;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Contest\ContestContestantRepository")
 */
class ContestContestant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contest\Contest", inversedBy="contestants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestantId;

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

    public function getContestantId(): ?Contestant
    {
        return $this->contestantId;
    }

    public function setContestantId(?Contestant $contestantId): self
    {
        $this->contestantId = $contestantId;

        return $this;
    }
}
