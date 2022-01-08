<?php

use Illuminate\Support\Facades\Route;
use Dnsimmons\OpenWeather\OpenWeather;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $country = App\Models\Country::where('name','Russia')->first();
    foreach ($country->cities as $key) {
        dd($key);
    }


    $weather = new OpenWeather();
    $current = $weather->getForecastWeatherByCityName('Moscow,US','metric');
    dump($current);
    //return 123;
});
