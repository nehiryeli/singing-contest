<?php


namespace App\Entity\Judge;

use App\Entity\Contestant\Contestant;
use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class RockJudge extends Judge implements JudgeInterface
{


    /**
     * Each Judge has their own calculation method based on their category
     * @param $roundScore
     * @return mixed
     */
    public function scoring($roundScore)
    {
        return 1;
        // TODO: Implement scoring() method.
    }
}