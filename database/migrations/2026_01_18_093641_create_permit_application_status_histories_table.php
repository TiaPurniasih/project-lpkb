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
        Schema::create('permit_application_status_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('permit_application_id');
            $table->integer('old_status');
            $table->integer('new_status');
            $table->unsignedBigInteger('changed_by');

            $table->timestamp('created_at')->useCurrent();
            $table->foreign(
                'permit_application_id',
                'pash_permit_app_fk'
            )->references('id')->on('permit_applications')->cascadeOnDelete();
            $table->foreign(
                'changed_by',
                'pash_changed_by_fk'
            )->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permit_application_status_histories');
    }
};
