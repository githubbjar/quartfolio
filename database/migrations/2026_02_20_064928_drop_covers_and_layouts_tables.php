<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('covers');
        Schema::dropIfExists('layouts');
    }

    public function down(): void
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};