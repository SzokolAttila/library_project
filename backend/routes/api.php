<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource("publishers", PublisherController::class)->only(["index", "show"]);
Route::apiResource("authors", AuthorController::class)->only(["index", "show"]);
Route::apiResource("genres", GenreController::class)->only(["index", "show"]);
Route::apiResource("books", BookController::class);