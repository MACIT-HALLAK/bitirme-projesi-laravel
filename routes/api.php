<?php

use App\Http\Controllers\AddBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\registerController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\emailController;

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


//Login yapmak için bir API olşturduk.
Route::post('/login/{email}/{password}', [loginController::class, 'login']);
//kayıt yapmak için kullanılan API
Route::post('/register', [registerController::class, 'register']);

Route::get('/sendemail/{email}', [emailController::class, 'send']);



Route::resource('addbook', AddBookController::class);
