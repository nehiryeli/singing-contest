<?php

namespace App\Entity\Contest;

use App\Entity\Contest\Contest;
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
    private $contest;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contestant\Contestant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contestant;

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
}
