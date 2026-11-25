<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShipperResource;
use App\Models\Shipper;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShipperController extends Controller
{
    /**
     * List shippers
     */
    public function index(): AnonymousResourceCollection
    {
        return ShipperResource::collection(Shipper::query()->orderBy('company')->get());
    }
}
