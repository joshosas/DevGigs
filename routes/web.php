<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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



// Single Listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);
