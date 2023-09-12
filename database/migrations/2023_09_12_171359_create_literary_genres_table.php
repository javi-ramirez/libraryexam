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
        Schema::create('literary_genres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id')->autoIncrement();
            $table->integer ('book_id');
            $table->integer ('category_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('literary_genres');
    }
};
