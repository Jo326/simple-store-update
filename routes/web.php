<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;

Route::get('/', MainController::class);

Auth::routes();

Route::resource('products', ProductController::class);
