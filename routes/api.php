<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountriesApiController;
use App\Http\Controllers\Api\CitiesApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

  Route::prefix('v1')->group(function () {
          Route::get('countries/cities/{country_id}', [CountriesApiController::class ,'cities']);
          Route::apiResource('countries', CountriesApiController::class);
          Route::apiResource('cities', CitiesApiController::class);
    });