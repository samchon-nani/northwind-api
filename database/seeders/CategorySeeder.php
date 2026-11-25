<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Baked Goods & Mixes',
            'Beverages',
            'Candy',
            'Canned Fruit & Vegetables',
            'Canned Meat',
            'Cereal',
            'Chips, Snacks',
            'Condiments',
            'Dairy products',
            'Dried Fruit & Nuts',
            'Grains',
            'Jams, Preserves',
            'Oil',
            'Pasta',
            'Sauces',
            'Soups',
        ];

        foreach ($names as $name) {
            Category::query()->updateOrCreate(['name' => $name]);
        }
    }
}
