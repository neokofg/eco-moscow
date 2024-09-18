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
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->date('birthdate')->nullable();
            $table->text('about')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('avatar_url')->nullable();

            $table->boolean('is_organizer')->default(false);
            $table->string('company')->nullable();
            $table->string('inn')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('kpp')->nullable();
            $table->string('okpo')->nullable();

            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->boolean('is_oauth')->default(false);

            $table->boolean('is_was_filled')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
