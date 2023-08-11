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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->string('short_name')->nonNullable();
            $table->string('full_name')->nonNullable();
            $table->string('photo_url')->nullable();
            $table->string('country_code')->nonNullable();
            $table->string('state')->nonNullable();
            $table->string('city')->nonNullable();
            $table->string('status')->nullable()->default('ENABLED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};