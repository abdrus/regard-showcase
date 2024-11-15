<?php

namespace Tests\Feature\Problems;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itTestsRunningTestsInSidecarDatabase(): void
    {
        $this->assertTrue(true);
    }
}
