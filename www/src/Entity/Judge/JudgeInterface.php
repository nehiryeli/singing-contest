<?php


namespace App\Entity\Judge;


use App\Entity\Contestant\Contestant;

interface JudgeInterface
{
    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundScore
     * @return mixed
     */
    public function scoring($roundScore);

}