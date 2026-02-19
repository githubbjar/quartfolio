<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('hero_path')->nullable()->after('year');  // adjust "after" as you like
            $table->string('thumb_path')->nullable()->after('hero_path');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['hero_path', 'thumb_path']);
        });
    }
};
