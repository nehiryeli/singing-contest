<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContestantRepository")
 */
class Contestant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsSick(): ?bool
    {
        return $this->isSick;
    }

    public function setIsSick(?bool $isSick): self
    {
        $this->isSick = $isSick;

        return $this;
    }
}
