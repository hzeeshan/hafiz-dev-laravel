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
        Schema::create('tool_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('tool_slug');
            $table->string('type');
            $table->text('message');
            $table->string('email')->nullable();
            $table->string('url');
            $table->string('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('is_resolved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_feedback');
    }
};
