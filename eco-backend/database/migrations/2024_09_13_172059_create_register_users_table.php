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
        Schema::create('register_users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->enum('type', ['user','business_user']);
            $table->string('token')->unique();
            $table->string('email');
            $table->string('name');
            $table->string('surname');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_users');
    }
};
