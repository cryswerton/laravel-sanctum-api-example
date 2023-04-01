<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Public routes
Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);

// Protected routes
Route::group(["middleware" => ["auth:sanctum"]], function () {

    Route::post("/logout", [UserController::class, "logout"]);

    Route::get("/products", [ProductController::class, "index"]);

    Route::post("/products", [ProductController::class, "store"]);

    Route::get("/products/{id}", [ProductController::class, "show"]);

    Route::put("/products/{id}", [ProductController::class, "update"]);

    Route::delete("/products/{id}", [ProductController::class, "destroy"]);

});
