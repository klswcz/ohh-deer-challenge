<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class OrdersTest extends TestCase
{

    /** @test */
    public function get_single_order()
    {
        $this->actingAs(User::first());
        $response = $this->get('/order?number=1003');

        $response->assertStatus(200);
    }

    /** @test */
    public function try_to_get_non_existing_order()
    {
        $this->actingAs(User::first());
        $response = $this->get('/order?number=' . Str::random(15));

        $response->assertStatus(302);
    }

    /** @test */
    public function try_to_get_order_without_logging_in()
    {
        $response = $this->get('/order?number=1003');

        $response->assertStatus(302);
    }

    /** @test */
    public function get_all_orders()
    {
        $this->actingAs(User::first());
        $response = $this->get('/all-orders');

        $response->assertStatus(200);
    }

    /** @test */
    public function try_to_get_all_orders_without_logging_in()
    {
        $response = $this->get('/all-orders');

        $response->assertStatus(302);
    }
}
