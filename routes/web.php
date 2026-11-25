<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['name' => 'Northwind API', 'products' => route('api.v1.products.index')]);
});
