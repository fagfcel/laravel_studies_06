<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(){
    $products = Product::all();
    echo "<pre>";
    print_r($products->toArray());
});
