<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("publishers")->insert([
            [
                "id" => 1,
                "name" => "Flatiron Books",
                "country" => "United States of America",
                "founded" => 2014,
                "website" => "https://flatironbooks.com"
            ],
            [
                "id" => 2,
                "name" => "Macmillan Publishers",
                "country" => "United States of America",
                "founded" => 1843,
                "website" => "https://us.macmillan.com"
            ],
            [
                "id" => 3,
                "name" => "Viking Penguin Books",
                "country" => "United Kingdom",
                "founded" => 1935,
                "website" => "https://penguin.com"
            ],
            [
                "id" => 4,
                "name" => "Atria",
                "country" => "United States of America",
                "founded" => 2002,
                "website" => "https://www.simonandschusterpublishing.com/atria/"
            ],
            [
                "id" => 5,
                "name" => "Miramax Books",
                "country" => "United States of America",
                "founded" => 2000
            ]
        ]); 
    }
}
