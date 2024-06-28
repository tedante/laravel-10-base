<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::get("ping", function () {
        return response()->json(["message" => "pong"]);
    });

    Route::post("register", [App\Http\Controllers\AuthController::class, "register"]);

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});