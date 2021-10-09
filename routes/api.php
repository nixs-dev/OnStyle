<?php


use App\Http\Controllers\AdmController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['checkIsAdmin'])->group(function () {
    Route::get('/private/getAll', [AdmController::class, 'getAllFromDatabase']);

	Route::post('/private/addProduct', [AdmController::class, 'addToDatabase']);

	Route::post('/private/deleteProduct', [AdmController::class, 'deleteFromDatabase']);
});

