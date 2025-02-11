<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("authors")->insert([
            [
                "id" => 1,
                "name" => "Leigh Bardugo", 
                "nationality" => "American-Israeli",
                "birth_date" => "1975-04-06"
            ],
            [
                "id" => 2,
                "name" => "George R. R. Martin",
                "birth_date" => "1948-09-20",
                "nationality" => "American"
            ],
            [
                "id" => 3,
                "name" => "Lev Grossman", 
                "birth_date" => "1969-06-26",
                "nationality" => "American"
            ],
            [
                "id" => 4,
                "name" => "Christopher Paolini", 
                "birth_date" => "1983-11-17",
                "nationality" => "American-Italian"
            ],
            [
                "id" => 5,
                "name" => "Donna Tart",
                "birth_date" => "1963-12-23",
                "nationality" => "American"
            ],
            [
                "id" => 6,
                "name" => "Rick Riordan",
                "nationality" => "American",
                "birth_date" => "1964-06-05"
            ],
            [
                "id" => 7,
                "name" => "Suzanne Collins",
                "nationality" => "American",
                "birth_date" => "1962-08-10"
            ],
            [
                "id" => 8,
                "name" => "J. K. Rowling",
                "nationality" => "British",
                "birth_date" => "1965-07-31"
            ],
            [
                "id" => 9,
                "name" => "J. R. R. Tolkien",
                "nationality" => "British",
                "birth_date" => "1892-01-03"
            ],
            [
                "id" => 10,
                "name" => "Jodi Picoult",
                "nationality" => "American",
                "birth_date" => "1966-05-19"
            ]
        ]);
    }
}
