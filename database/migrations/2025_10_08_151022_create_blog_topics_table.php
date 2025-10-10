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
        Schema::create('blog_topics', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->string('category', 100)->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->string('target_audience', 100)->nullable();
            $table->integer('priority')->default(5); // 1-10 (10 = highest)

            // Generation Mode
            $table->enum('generation_mode', [
                'topic',              // Original StudyLab mode
                'context_youtube',    // YouTube video analysis
                'context_blog',       // Blog post remix
                'context_twitter',    // Twitter thread expansion (future)
            ])->default('topic');

            // Content Type
            $table->enum('content_type', ['technical', 'opinion', 'news'])
                ->default('technical')
                ->comment('Type of content: technical (with code), opinion (general), or news (updates)');

            // Context Sources
            $table->string('source_url', 500)->nullable();
            $table->longText('source_content')->nullable();
            $table->json('source_metadata')->nullable();
            $table->text('custom_prompt')->nullable();

            // Automation
            $table->enum('status', [
                'pending',
                'generating',
                'review',
                'approved',
                'published',
                'skipped'
            ])->default('pending');
            $table->timestamp('scheduled_for')->nullable();

            // Distribution Settings
            $table->boolean('publish_to_devto')->default(true);
            $table->boolean('publish_to_hashnode')->default(true);
            $table->boolean('publish_to_linkedin')->default(true);
            $table->boolean('publish_to_medium')->default(false);

            // Tracking Timestamps
            $table->timestamp('generated_at')->nullable();
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('status');
            $table->index('generation_mode');
            $table->index('scheduled_for');
            $table->index('priority');
            $table->index(['status', 'priority']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_topics');
    }
};
