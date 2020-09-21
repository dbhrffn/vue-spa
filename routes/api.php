<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/cruds', 'API\CrudsController', [
    'except' => ['edit', 'show', 'store']
]);

Route::resource('/events', 'API\EventsController', [
    'except' => ['edit', 'show', 'store']
]);

Route::post('/events/create', 'API\EventsController@create');

