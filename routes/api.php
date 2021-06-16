<?php

use App\Http\Controllers\API\DefaultController;
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

Route::get("/migration",[DefaultController::class,"index"]);
Route::get("/migration/{id}",[DefaultController::class,"show"]);
Route::post("/posts",[DefaultController::class,"create"]);
Route::get("/posts",[DefaultController::class,"read"]);
Route::get("/posts/{id}",[DefaultController::class,"readbyid"]);
Route::put('/postsupdate/{id}',[DefaultController::class,'update']);
Route::delete('/postsdelete/{id}',[DefaultController::class,'delete']);




