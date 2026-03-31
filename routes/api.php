<?php

use App\Http\Controllers\Api\CatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("cats", [CatController::class, "index"]);

Route::get("cats/total-ex", [CatController::class, "total"]);

Route::get("cats/{cat}", [CatController::class, "show"]);


