<?php

namespace Tests\Unit\Problems;

use Tests\TestCase;
use App\Problems\ReverseList\ReverseNode;

class ReverseNodeTest extends TestCase
{
    /**
    * @test
    */
    public function itTestsReverseNode()
    {
        $a = new ReverseNode();
        $b = new ReverseNode();
        $a->next = $b;

        $this->assertTrue($a->next === $b);
        $this->assertTrue($b->next === null);
    }
}
