<?php

namespace Tests\Feature\Problems;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
