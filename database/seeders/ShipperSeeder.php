<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Illuminate\Database\Seeder;

class ShipperSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Northern Freight', 'Harbor Express', 'Prairie Parcel'] as $company) {
            Shipper::query()->updateOrCreate(['company' => $company]);
        }
    }
}
