<?php

namespace Tests\Feature\Problems;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;
use App\Models\Manager;

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

    /** @test */
    public function itShowsOrdersWithManagers(): void
    {
        $managers = Manager::factory()
        ->count(5)
        ->has(Order::factory()->count(10))
        ->create();

        $orders = Order::with('manager')->get()->take(50);

        foreach ($orders as $order)
        {
            printf("Заказ %d менеджера: %s %s\n", $order->id, $order->manager->firstname, $order->manager->lastname );
            // dd($order->manager);
        }

        $this->assertEquals(50, count($orders));
    }
}
