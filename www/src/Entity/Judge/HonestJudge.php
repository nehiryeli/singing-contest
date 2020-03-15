<?php


namespace App\Entity\Judge;

use Doctrine\ORM\Mapping\Entity;

/** @Entity */
class HonestJudge extends Judge implements JudgeInterface
{


    /**
     * Each Judge has their own calculation method based on their category
     * @return mixed
     */
    public function scoring()
    {
        return 2;
        // TODO: Implement scoring() method.
    }
}