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
        Schema::create('newses', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->string('header');
            $table->text('content');
            $table->integer('views')->default(0);
            $table->string('image_url');
            $table->ulid('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newses');
    }
};
