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
        Schema::create('loans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id')->autoIncrement();
            $table->integer ('user_id');
            $table->integer ('book_id');
            $table->dateTime('loan_date');
            $table->boolean('status');
            $table->dateTime('return_date');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('book_id')->references('id')->on('books');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
