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
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('publish_to_devto')->default(true)->after('requires_code_review');
            $table->boolean('publish_to_hashnode')->default(true)->after('publish_to_devto');
            $table->boolean('publish_to_linkedin')->default(true)->after('publish_to_hashnode');
            $table->boolean('publish_to_medium')->default(false)->after('publish_to_linkedin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'publish_to_devto',
                'publish_to_hashnode',
                'publish_to_linkedin',
                'publish_to_medium',
            ]);
        });
    }
};
