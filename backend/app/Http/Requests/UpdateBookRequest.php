<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "language" => ["required", "string", "max:30"],
            "title" => ["required", "string", "between:2,80"],
            "pages" => ["required", "integer"],
            "published_date" => ["required", "date", "before:today"],
            "description" => ["nullable", "string", "max:1000"],
            "genre_id" => ["required", "integer", "exists:genres,id"],
            "author_id" => ["required", "integer", "exists:authors,id"],
            "publisher_id" => ["required", "integer", "exists:publishers,id"]
        ];
    }
}
