<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;

/**
 * auth routes
 */
Route::post('login',[LoginController::class, 'login']);

/**
 * item routes
 */
Route::middleware(['auth:api'])->prefix('item')->group(function () {
    Route::post('add',[ItemController::class, 'addItem']);
    Route::put('edit',[ItemController::class, 'editItem']);
    Route::delete('remove',[ItemController::class, 'removeItem']);
});


/**
 * customer routes
 */
Route::middleware(['auth:api'])->prefix('customer')->group(function () {
    Route::post('add',[CustomerController::class, 'addCustomer']);
    Route::put('edit',[CustomerController::class, 'editCustomer']);
    Route::delete('remove',[CustomerController::class, 'removeCustomer']);
});
