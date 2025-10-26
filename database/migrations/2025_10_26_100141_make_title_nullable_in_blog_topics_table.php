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
        Schema::table('blog_topics', function (Blueprint $table) {
            // Make title nullable for remix mode (AI will generate title from source content)
            $table->string('title')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_topics', function (Blueprint $table) {
            // Revert title back to NOT NULL
            $table->string('title')->nullable(false)->change();
        });
    }
};
