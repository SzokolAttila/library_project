<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("genres")->insert([
            [
                "id" => 1,
                "name" => "adventure"
            ] ,
            [
                "id" => 2,
                "name" => "crime"
            ],
            [
                "id" => 3,
                "name" => "drama", 
            ],
            [
                "id" => 4,
                "name" => "fantasy"
            ],
            [
                "id" => 5,
                "name" => "horror"
            ],
            [
                "id" => 6,
                "name" => "science fiction"
            ],
            [
                "id" => 7,
                "name" => "thriller"
            ],
            [
                "id" => 8,
                "name" => "romance"
            ],
            [
                "id" => 9,
                "name" => "classic"
            ],
            [
                "id" => 10,
                "name" => "contemporary"
            ]
        ]);
    }
}
