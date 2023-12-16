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
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable(); // Add Street field
            $table->string('landmark')->nullable(); // Add Landmark field
            $table->string('city')->nullable(); // Add City field
            $table->string('state')->nullable(); // Add State field
            $table->string('pincode')->nullable(); // Add Pincode field
            $table->string('country')->nullable(); // Add Country field
            $table->enum('role', ['admin', 'vendor', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        // Add a virtual column 'address' that concatenates Street, Landmark, City, State, Pincode, Country
        DB::statement('ALTER TABLE users ADD address VARCHAR(255) GENERATED ALWAYS AS (CONCAT_WS(", ", street, landmark, city, state, pincode, country)) VIRTUAL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
