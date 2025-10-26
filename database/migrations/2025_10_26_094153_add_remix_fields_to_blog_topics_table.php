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
            // Remix style: how to transform source content
            $table->string('remix_style')->nullable()->after('source_content')
                ->comment('Remix transformation style: commentary, deep_dive, summary, response');

            // Source type: categorize where content came from
            $table->string('source_type')->nullable()->after('remix_style')
                ->comment('Source category: youtube, blog_post, medium, article, other');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_topics', function (Blueprint $table) {
            $table->dropColumn(['remix_style', 'source_type']);
        });
    }
};
