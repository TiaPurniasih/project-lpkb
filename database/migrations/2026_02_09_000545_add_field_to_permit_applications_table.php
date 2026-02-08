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
        Schema::table('permit_applications', function (Blueprint $table) {
            $table->boolean('certificate_state')->nullable();
            $table->text('certificate_file')->nullable();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permit_applications', function (Blueprint $table) {
            $table->dropColumn(['certificate_state', 'certificate_file', 'published_at']);
        });
    }
};
