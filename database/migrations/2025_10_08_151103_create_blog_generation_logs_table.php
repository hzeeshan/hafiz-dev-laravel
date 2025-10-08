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
        Schema::create('blog_generation_logs', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->foreignId('topic_id')->constrained('blog_topics')->cascadeOnDelete();
            $table->foreignId('post_id')->nullable()->constrained('posts')->nullOnDelete();

            // Status Tracking
            $table->enum('status', [
                'started',
                'content_generated',
                'images_generated',
                'completed',
                'failed'
            ])->default('started');

            // Error Handling
            $table->text('error_message')->nullable();
            $table->text('error_stack')->nullable();
            $table->integer('retry_count')->default(0);

            // Performance Metrics
            $table->integer('generation_time')->nullable()->comment('Seconds');
            $table->integer('content_tokens')->nullable();
            $table->integer('image_count')->default(0);

            // Cost Tracking
            $table->json('cost_tracking')->nullable()->comment('JSON: {content: 0.002, images: 0.025, total: 0.027}');

            // AI Details
            $table->string('ai_provider', 50)->nullable()->comment('deepseek or openai');
            $table->string('ai_model', 100)->nullable();
            $table->string('image_provider', 50)->nullable()->comment('together or runware');

            $table->timestamps();

            // Indexes
            $table->index('topic_id');
            $table->index('post_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_generation_logs');
    }
};
