<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->string("isbn", 13);
            $table->string("title", 80);
            $table->string("language", 30);
            $table->integer("pages");
            $table->date("published_date");
            $table->foreignId("genre_id")->constrained();
            $table->foreignId("author_id")->constrained();
            $table->foreignId("publisher")->constrained();
            $table->text("description");
            $table->primary("isbn");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
