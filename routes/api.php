<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('products', [ProductController::class, 'getList']);

    Route::post('pay', [PaymentController::class, 'pay']);
    Route::post('prolong', [PaymentController::class, 'prolong']);

    Route::post('purchases', [PurchaseController::class, 'getList']);
    Route::get('purchases/{purchase}', [PurchaseController::class, 'get']);
});
