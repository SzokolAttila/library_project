<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResource
    {
        return AuthorResource::collection(Author::with("books")->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author) : JsonResource
    {
        return new AuthorResource($author->load("books"));
    }

}
