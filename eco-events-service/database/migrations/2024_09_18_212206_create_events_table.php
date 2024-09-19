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
        Schema::create('events', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->string('title');
            $table->text('content');
            $table->string('image_url');
            $table->string('address');
            $table->magellanPoint('location', 3857);
            $table->integer('views')->default(0);
            $table->ulid('user_id');
            $table->ulid('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
