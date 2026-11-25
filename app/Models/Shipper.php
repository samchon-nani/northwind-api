<?php

namespace App\Models;

use Database\Factories\ShipperFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['company'])]
class Shipper extends Model
{
    /** @use HasFactory<ShipperFactory> */
    use HasFactory;
}
