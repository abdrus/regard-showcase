<?php

namespace Tests\Unit\Problems;

use App\Problems\Packages;
use Tests\TestCase;

class PackagesTest extends TestCase
{
    /**
     * @test
     */
    public function ItTestsPackages(): void
    {
        $task = new Packages;

        $boxes = [2, 4, 3, 6, 1];
        $weight = 5;

        $this->assertEquals(2, $task->solve($boxes, $weight));

        $boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
        $weight = 6;

        $this->assertEquals(12, $task->solve($boxes, $weight));

    }

    /**
     * @test
     */
    public function ItTestsEmptyPackages(): void
    {
        $task = new Packages;

        $boxes = [];
        $weight = 0;

        $this->assertEquals(0, $task->solve($boxes, $weight));
    }

    /**
     * @test
     */
    public function ItTestsPairs(): void
    {
        $task = new Packages;
        $this->assertTrue($task->hasPairAlready([[1, 2]], 1, 2));
        $this->assertTrue($task->hasPairAlready([[1, 2]], 2, 1));
        $this->assertTrue($task->hasPairAlready([[1, 2], [3, 4]], 2, 1));
        $this->assertTrue($task->hasPairAlready([[1, 2], [3, 4]], 4, 3));

        $this->assertFalse($task->hasPairAlready([[1, 2], [3, 4]], 5, 6));
    }
}
