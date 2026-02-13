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
        Schema::table('tool_cta_settings', function (Blueprint $table) {
            $table->string('locale', 5)->default('en')->after('id');
            $table->unique('locale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tool_cta_settings', function (Blueprint $table) {
            $table->dropUnique(['locale']);
            $table->dropColumn('locale');
        });
    }
};
