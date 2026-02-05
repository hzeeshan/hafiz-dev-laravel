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
        Schema::create('discovered_leads', function (Blueprint $table) {
            $table->id();

            // Source info
            $table->string('source')->comment('reddit, hackernews');
            $table->string('source_id')->comment('External ID from API');
            $table->string('title', 500);
            $table->string('url', 500);
            $table->text('body')->nullable()->comment('Post body text');
            $table->string('author')->nullable();
            $table->string('subreddit')->nullable()->comment('For Reddit posts');

            // Scoring
            $table->float('calculated_score', 3, 1)->default(0)->comment('0-10 score based on intent');
            $table->string('score_category')->comment('hot_lead, strong_lead, worth_checking, saved');

            // Engagement metrics
            $table->integer('upvotes')->default(0);
            $table->integer('comments_count')->default(0);

            // Intent analysis
            $table->json('intent_keywords_found')->comment('Which intent keywords matched');
            $table->json('metadata')->nullable()->comment('Raw API data');

            // Timestamps
            $table->timestamp('posted_at')->comment('When the original post was created');
            $table->timestamp('discovered_at');

            // Lead management
            $table->string('status')->default('new')->comment('new, contacted, replied, converted, skipped');
            $table->text('notes')->nullable()->comment('Personal notes about this lead');

            // Notification tracking
            $table->boolean('notified')->default(false);
            $table->timestamp('notified_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->unique(['source', 'source_id']);
            $table->index('calculated_score');
            $table->index('score_category');
            $table->index('status');
            $table->index('discovered_at');
            $table->index('subreddit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discovered_leads');
    }
};
