<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///** USER */
//Route::post('authenticate', function(Request $request) {
//    $teste = new AuthenticatedSessionController();
//    return $teste->tokenAuthenticate($request);
//});

///** USER */
//Route::group(['middleware' => ['api']], function () {
//    Route::post('authenticate', function(Request $request) {
//        $teste = new AuthenticatedSessionController();
//        return $teste->authenticate($request);
//    });
//});

///** USER */
//Route::post('authenticate', function(Request $request) {
//    $teste = new AuthenticatedSessionController();
//    return $teste->tokenAuthenticate($request);
//});
