<?php

namespace Tests\Feature\Api\V1;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_products_in_pages(): void
    {
        Product::factory()->count(3)->create();

        $this->getJson(route('api.v1.products.index', ['per_page' => 2]))
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('meta.total', 3)
            ->assertJsonStructure(['data' => [['id', 'code', 'name', 'price', 'category']], 'links', 'meta']);
    }

    public function test_it_filters_products_by_category(): void
    {
        $category = Category::factory()->create(['name' => 'Chips, Snacks']);
        $product = Product::factory()->for($category)->create();
        Product::factory()->create();

        $this->getJson(route('api.v1.products.index', ['category' => 'Chips, Snacks']))
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $product->id);
    }

    public function test_it_rejects_a_page_size_over_the_limit(): void
    {
        $this->getJson(route('api.v1.products.index', ['per_page' => 101]))
            ->assertUnprocessable()
            ->assertJsonValidationErrors('per_page');
    }

    public function test_it_shows_one_product(): void
    {
        $product = Product::factory()->create(['price' => 12.95]);

        $this->getJson(route('api.v1.products.show', $product))
            ->assertOk()
            ->assertExactJson(['data' => [
                'id' => $product->id,
                'code' => $product->code,
                'name' => $product->name,
                'price' => 12.95,
                'category' => $product->category->name,
            ]]);
    }

    public function test_it_returns_not_found_for_a_missing_product(): void
    {
        $this->getJson(route('api.v1.products.show', 999))->assertNotFound();
    }

    public function test_products_are_read_only(): void
    {
        $this->postJson(route('api.v1.products.index'))->assertMethodNotAllowed();
    }
}
