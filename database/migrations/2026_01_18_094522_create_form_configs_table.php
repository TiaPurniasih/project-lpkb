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
        Schema::create('form_configs', function (Blueprint $table) {
            $table->id();
            $table->efficientUuid('uuid')->unique();

            // Form level
            $table->string('category', 20); // formal | nonformal
            $table->string('form_title');
            $table->string('form_code');
            $table->string('form_codex');
            $table->text('description')->nullable();

            // Field level
            $table->string('field_type', 50);
            $table->string('field_name');
            $table->string('field_label');
            $table->string('placeholder')->nullable();
            $table->json('options')->nullable();

            $table->integer('page')->default(1);
            $table->string('section')->nullable();
            $table->integer('field_group')->nullable();

            $table->boolean('required')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Index untuk performa
            $table->index(['category', 'form_code']);
            $table->index(['form_code', 'page']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_configs');
    }
};
