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
            $table->string('first_name')->nonNullable();
            $table->string('last_name')->nonNullable();
            $table->string('email')->unique()->nonNullable();
            $table->string('password')->nonNullable();
            $table->string('role')->nullable()->default('USER');
            $table->string('country_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('address_number')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('bio')->nullable();
            $table->string('curriculum_url')->nullable();
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
