<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListProductsRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * List products
     *
     * Returns a page of products, optionally limited to one category.
     */
    public function index(ListProductsRequest $request): AnonymousResourceCollection
    {
        $filters = $request->validated();

        $products = Product::query()
            ->with('category')
            ->when($filters['category'] ?? null, function (Builder $query, string $category): void {
                $query->whereRelation('category', 'name', $category);
            })
            ->orderBy('id')
            ->paginate((int) ($filters['per_page'] ?? 15))
            ->withQueryString();

        return ProductResource::collection($products);
    }

    /**
     * Show a product
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product->load('category'));
    }
}
