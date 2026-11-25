<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['code' => 'NWD-001', 'name' => 'Oatmeal Cookie Mix', 'price' => '6.50', 'category' => 'Baked Goods & Mixes'],
            ['code' => 'NWD-002', 'name' => 'Buttermilk Pancake Mix', 'price' => '5.25', 'category' => 'Baked Goods & Mixes'],
            ['code' => 'NWD-003', 'name' => 'Ginger Peach Tea', 'price' => '4.75', 'category' => 'Beverages'],
            ['code' => 'NWD-004', 'name' => 'Dark Roast Coffee', 'price' => '12.95', 'category' => 'Beverages'],
            ['code' => 'NWD-005', 'name' => 'Sea Salt Caramels', 'price' => '7.50', 'category' => 'Candy'],
            ['code' => 'NWD-006', 'name' => 'Sliced Pears', 'price' => '2.40', 'category' => 'Canned Fruit & Vegetables'],
            ['code' => 'NWD-007', 'name' => 'Sweet Corn', 'price' => '1.65', 'category' => 'Canned Fruit & Vegetables'],
            ['code' => 'NWD-008', 'name' => 'Smoked Tuna', 'price' => '3.85', 'category' => 'Canned Meat'],
            ['code' => 'NWD-009', 'name' => 'Honey Almond Granola', 'price' => '5.95', 'category' => 'Cereal'],
            ['code' => 'NWD-010', 'name' => 'Sea Salt Pita Chips', 'price' => '3.75', 'category' => 'Chips, Snacks'],
            ['code' => 'NWD-011', 'name' => 'Trail Mix', 'price' => '6.25', 'category' => 'Chips, Snacks'],
            ['code' => 'NWD-012', 'name' => 'Stone Ground Mustard', 'price' => '3.20', 'category' => 'Condiments'],
            ['code' => 'NWD-013', 'name' => 'Aged White Cheddar', 'price' => '8.75', 'category' => 'Dairy products'],
            ['code' => 'NWD-014', 'name' => 'Dried Apricots', 'price' => '6.80', 'category' => 'Dried Fruit & Nuts'],
            ['code' => 'NWD-015', 'name' => 'Roasted Cashews', 'price' => '9.40', 'category' => 'Dried Fruit & Nuts'],
            ['code' => 'NWD-016', 'name' => 'Long Grain Rice', 'price' => '4.10', 'category' => 'Grains'],
            ['code' => 'NWD-017', 'name' => 'Raspberry Preserves', 'price' => '5.60', 'category' => 'Jams, Preserves'],
            ['code' => 'NWD-018', 'name' => 'Extra Virgin Olive Oil', 'price' => '14.50', 'category' => 'Oil'],
            ['code' => 'NWD-019', 'name' => 'Whole Wheat Penne', 'price' => '2.95', 'category' => 'Pasta'],
            ['code' => 'NWD-020', 'name' => 'Roasted Garlic Marinara', 'price' => '4.95', 'category' => 'Sauces'],
            ['code' => 'NWD-021', 'name' => 'Mild Curry Sauce', 'price' => '5.40', 'category' => 'Sauces'],
            ['code' => 'NWD-022', 'name' => 'Tomato Basil Soup', 'price' => '3.30', 'category' => 'Soups'],
        ];

        $categoryIds = Category::query()->pluck('id', 'name');

        foreach ($products as $product) {
            Product::query()->updateOrCreate(['code' => $product['code']], [
                'name' => $product['name'],
                'price' => $product['price'],
                'category_id' => $categoryIds[$product['category']],
            ]);
        }
    }
}
