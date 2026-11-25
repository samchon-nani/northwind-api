<?php

namespace Tests\Feature\Api\V1;

use App\Models\Shipper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipperApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_shippers_alphabetically(): void
    {
        Shipper::factory()->create(['company' => 'Zulu Freight']);
        Shipper::factory()->create(['company' => 'Alpha Freight']);

        $this->getJson(route('api.v1.shippers.index'))
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('data.0.company', 'Alpha Freight')
            ->assertJsonPath('data.1.company', 'Zulu Freight');
    }
}
