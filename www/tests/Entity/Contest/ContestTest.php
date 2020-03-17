<?php


namespace App\Tests\Entity\Contest;


use App\Entity\Contest\Contest;
use PHPUnit\Framework\TestCase;

class ContestTest extends TestCase
{
    public function testIsCompletedVarType(){
        $contest = new Contest();
        $this->assertEmpty($contest->getIsCompleted());

    }


}