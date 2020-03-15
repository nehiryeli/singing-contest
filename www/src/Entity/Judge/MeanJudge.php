<?php


namespace App\Entity\Judge;

use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class MeanJudge extends Judge implements JudgeInterface
{


    /**
     * Each Judge has their own calculation method based on their category
     * @return mixed
     */


    public function scoring()
    {
        return 1;
        // TODO: Implement scoring() method.
    }
}