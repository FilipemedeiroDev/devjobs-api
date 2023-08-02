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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('headline')->nonNullable();
            $table->string('description')->nonNullable();
            $table->string('requirements')->nonNullable();
            $table->string('status');
            $table->string('routine')->nonNullable();
            $table->string('location')->nonNullable();
            $table->string('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};