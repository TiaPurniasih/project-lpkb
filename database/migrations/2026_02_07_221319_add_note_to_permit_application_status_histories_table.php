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
        Schema::table('permit_application_status_histories', function (Blueprint $table) {
            $table->text('notes')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permit_application_status_histories', function (Blueprint $table) {
            $table->dropColumn(['notes', 'updated_at']);
        });
    }
};
