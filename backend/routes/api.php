<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("publishers", PublisherController::class)->only(["index", "show"]);
Route::apiResource("authors", AuthorController::class)->only(["index", "show"]);