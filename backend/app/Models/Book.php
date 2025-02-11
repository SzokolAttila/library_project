<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['isbn', 'title', 'language', 'pages', 'published_date', 'description', 'genre_id', 'author_id', 'publisher_id'];

    public function genre() : BelongsTo{
        return $this->belongsTo(Genre::class);
    }

    public function publisher() : BelongsTo{
        return $this->belongsTo(Publisher::class);
    }

    public function author() : BelongsTo{
        return $this->belongsTo(Author::class);
    }
}
