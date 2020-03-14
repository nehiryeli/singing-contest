<?php

namespace App\Entity\Judge;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Judge\JudgeRepository")
 */
class Judge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Judge\JudgeCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryId(): ?JudgeCategory
    {
        return $this->category_id;
    }

    public function setCategoryId(?JudgeCategory $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }
}
