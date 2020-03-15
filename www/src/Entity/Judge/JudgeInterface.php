<?php


namespace App\Entity\Judge;


interface JudgeInterface
{
    /**
     * Each Judge has their own calculation method based on their category
     * @return mixed
     */
    public function scoring();

}