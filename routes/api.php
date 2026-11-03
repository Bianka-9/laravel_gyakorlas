<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DrinkController;
use App\Http\Controllers\api\PubController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/drinks', [PubController::class, 'getDrinks']);
Route::get('/drinks/{drink}', [PubController::class, 'getDrink']);

// Route::get('/drinks', [ DrinkController::class, 'getDrinks' ]);
// Route::get('/drink-name', [ DrinkController::class, 'getDrinkName']);
// Route::get('/drink', [ DrinkController::class, 'getDrink']);
// Route::get('/drink100', [ DrinkController::class, 'getLessHundred']);
// Route::get('/drink-more-100', [ DrinkController::class, 'getMoreHundred']);
// Route::get('/drinks-all', [ DrinkController::class, 'getDrinksAll']);

// Route::get('/drinks/{id}', [ DrinkController::class, 'updateDrink']);
// Route::get('/del-drink/{id}', [DrinkController::class, 'deleteDrink']);