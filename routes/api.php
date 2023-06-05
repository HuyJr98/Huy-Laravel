<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->get('/table', function (Request $request) {
    return $request->user();
});

Route::get('/table', [TableController::class, 'index']);
Route::get('/table/{id}', [TableController::class, 'getId']);
Route::post('/login', [TableController::class, 'login']);
Route::post('/register', [TableController::class, 'register']);
Route::post('/create', [TableController::class, 'createTable']);
Route::put('/update/{id}', [TableController::class, 'updateTable']);
Route::delete('/delete/{id}', [TableController::class, 'destroy']);
