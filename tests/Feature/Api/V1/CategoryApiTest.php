<?php

namespace Tests\Feature\Api\V1;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_categories_alphabetically(): void
    {
        Category::factory()->create(['name' => 'Walnuts']);
        Category::factory()->create(['name' => 'Apples']);

        $this->getJson(route('api.v1.categories.index'))
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('data.0.name', 'Apples')
            ->assertJsonPath('data.1.name', 'Walnuts');
    }
}
