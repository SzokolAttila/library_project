<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Resources\Json\JsonResource;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResource
    {
        return PublisherResource::collection(Publisher::with("books")->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher) : JsonResource
    {
        return new PublisherResource($publisher->load("books"));
    }
}
