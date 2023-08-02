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
            $table->string('role');
            $table->string('country_code');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('neighborhood');
            $table->string('address_number');
            $table->string('avatar_url');
            $table->string('bio');
            $table->string('curriculum_url');
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