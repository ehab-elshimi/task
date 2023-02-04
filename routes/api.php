<?php

use App\Http\Controllers\Api\AdminController;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// Admin Route to add new user with specific role
Route::middleware('auth:group')->group(function () {
    Route::post('/admin/create-user', [AdminController::class, 'create_new_user']);
    Route::get('/user', function (Request $request) {
        return new UserResource($request->user());
    });
});
