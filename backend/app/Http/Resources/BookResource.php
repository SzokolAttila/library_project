<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "isbn" => $this->isbn,
            "title" => $this->title,
            "language" => $this->language,
            "pages" => $this->pages,
            "published_date" => $this->published_date,
            "description" => $this->description,
            "genre" => new GenreResource($this->whenLoaded('genre')),
            "author" => new GenreResource($this->whenLoaded('author')),
            "publisher" => new GenreResource($this->whenLoaded('publisher'))
        ];
    }
}
