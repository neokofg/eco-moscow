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
        Schema::create('competition_user', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->foreignId('competition_id')->constrained('events');
            $table->ulid('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_user');
    }
};
