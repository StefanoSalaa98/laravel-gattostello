<?php

use App\Http\Controllers\Api\ReceiptController;
use App\Http\Controllers\Api\CatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VolunteerRequestController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("cats", [CatController::class, "index"]);

Route::get("cats/total-ex", [CatController::class, "total"]);

Route::get("cats/{cat}", [CatController::class, "show"]);

Route::post('/richiesta-ricevuta', [ReceiptController::class, 'store']);

Route::post('/richiesta-volontario', [VolunteerRequestController::class, 'store']);


