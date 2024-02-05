<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Listing
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Form
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Show Register
Route::get('/register', [UserController::class, 'register']);

// Show Register
Route::get('/login', [UserController::class, 'login']);

// Create User Account
Route::post('/users', [UserController::class, 'store']);



// Single Listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);
