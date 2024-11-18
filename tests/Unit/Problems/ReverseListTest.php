<?php

namespace Tests\Unit\Problems;

use App\Problems\Packages;
use Tests\TestCase;
use App\Problems\ReverseList\ReverseList;
use App\Problems\ReverseList\ReverseNode;

class ReverseListTest extends TestCase
{
    /**
     * @test
     */
    public function ItTestsReverseList(): void
    {
        $a = new ReverseNode();
        $b = new ReverseNode();
        $c = new ReverseNode();

        $a->next = $b;
        $b->next = $c;
        $c->next = null;

        $solution = new ReverseList();
        $solution->solve($a);

        $this->assertEquals($b, $c->next);
        $this->assertEquals($a, $b->next);
        $this->assertEquals(null, $a->next);
    }

}
