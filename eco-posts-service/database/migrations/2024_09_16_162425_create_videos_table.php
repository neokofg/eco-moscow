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
        Schema::create('videos', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('views')->default(0);
            $table->string('video_url');
            $table->string('preview_url');
            $table->ulid('user_id');
            $table->ulid('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
