<?php

namespace Tests\Unit\Problems;

use App\Problems\ReverseList\ReverseNode;
use Tests\TestCase;

class ReverseNodeTest extends TestCase
{
    /**
     * @test
     */
    public function itTestsReverseNode()
    {
        $a = new ReverseNode;
        $b = new ReverseNode;
        $a->next = $b;

        $this->assertTrue($a->next === $b);
        $this->assertTrue($b->next === null);
    }
}
