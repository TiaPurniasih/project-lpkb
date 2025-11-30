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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('pic_name')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('institution_phone')->nullable();
            $table->date('established_date')->nullable();
            $table->string('educational_track')->nullable();
            $table->string('buddhist_education_type')->nullable();
            $table->text('address')->nullable();
            $table->text('doc_1')->nullable();
            $table->text('doc_2')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('subdistrict')->nullable();
            $table->text('educational_address')->nullable();
            $table->text('photo_1')->nullable();
            $table->text('photo_2')->nullable();
            $table->text('photo_3')->nullable();
            $table->text('photo_4')->nullable();
            $table->string('bank_province')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_office')->nullable();
            $table->text('bank_file')->nullable();
            $table->boolean('is_complete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
