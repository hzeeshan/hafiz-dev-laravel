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
        Schema::create('trending_topic_sources', function (Blueprint $table) {
            $table->id();

            // Source information
            $table->string('source')->comment('reddit, hackernews, google_trends');
            $table->string('source_id')->nullable()->comment('External ID from source API');
            $table->string('title');
            $table->string('url', 500)->nullable();
            $table->text('excerpt')->nullable();
            $table->json('metadata')->comment('Raw data from API');

            // Metrics
            $table->float('calculated_score', 3, 1)->default(0)->comment('0-10 score');
            $table->integer('upvotes')->default(0);
            $table->integer('comments_count')->default(0);

            // Keywords (JSON array)
            $table->json('keywords')->nullable();

            // Tracking
            $table->timestamp('discovered_at');
            $table->foreignId('blog_topic_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('converted_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['source', 'source_id']);
            $table->index('calculated_score');
            $table->index('discovered_at');
            $table->index('blog_topic_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trending_topic_sources');
    }
};
