<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("books")->insert([
            [
                "isbn" => "9780805094596",
                "title" => "Shadow and Bone",
                "language" => "English",
                "pages" => 645,
                "published_date" => "2012-06-05",
                "genre_id" => 4,
                "publisher_id" => 3,
                "author_id" => 1
            ],
            [
                "isbn" => "9783104009902",
                "title" => "The Magicians",
                "language" => "English",
                "pages" => 537,
                "published_date" => "2009-03-30",
                "publisher_id" => 4,
                "genre_id" => 4,
                "author_id" => 3
            ],
            [
                "isbn" => "9781250313102",
                "title" => "Hell Bent",
                "pages" => 454,
                "language" => "English",
                "published_date" => "2023-01-10",
                "publisher_id" => 1,
                "genre_id" => 7,
                "author_id" => 1
            ],
            [
                "isbn" => "9780060814205",
                "title" => "The Secret History",
                "pages" => 657,
                "language" => "English",
                "published_date" => "1992-09-13",
                "genre_id" => 2,
                "publisher_id" => 5,
                "author_id" => 5
            ],
            [
                "isbn" => "9780007237500",
                "title" => "A Game of Thrones",
                "language" => "English",
                "published_date" => "1996-08-01",
                "pages" => 903,
                "genre_id" => 4,
                "author_id" => 2,
                "publisher_id" => 1
            ],
            [
                "isbn" => "9780307245304",
                "title" => "Percy Jackson and the Olympians: The Lightning Thief",
                "pages" => 385,
                "language" => "English",
                "published_date" => "2005-06-28",
                "genre_id" => 4,
                "publisher_id" => 4,
                "author_id" => 6
            ],
            [
                "isbn" => "9781400090686",
                "title" => "Eragon",
                "pages" => 751,
                "language" => "English",
                "published_date" => "2002-05-25",
                "genre_id" => 4,
                "author_id" => 4,
                "publisher_id" => 2
            ],
            [
                "isbn" => "9786555950281",
                "title" => "The Hunger Games",
                "pages" => 427,
                "language" => "English",
                "published_date" => "2008-09-14",
                "publisher_id" => 5,
                "author_id" => 7,
                "genre_id" => 6
            ],
            [
                "isbn" => "9780807286005",
                "title" => "Harry Potter and The Philosopher's Stone",
                "language" => "English",
                "pages" => 465,
                "published_date" => "1997-06-26",
                "genre_id" => 4,
                "author_id" => 8,
                "publisher_id" => 1
            ],
            [
                "isbn" => "9781250076960",
                "title" => "Six of Crows",
                "language" => "English",
                "pages" => 432,
                "published_date" => "2015-09-29",
                "genre_id" => 4,
                "author_id" => 1,
                "publisher_id" => 5
            ]
        ]);
    }
}
