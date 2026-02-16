<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('date');

            $table->unsignedSmallInteger('year')->nullable()->after('type');
            $table->unsignedTinyInteger('quarter')->nullable()->after('year');

            $table->index(['year', 'quarter']);
        });
}

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Remove new fields
            $table->dropIndex(['projects_year_quarter_index']);
            $table->dropColumn(['year', 'quarter']);

            // Restore old column
            $table->text('date')->after('type');
        });
    }
};
