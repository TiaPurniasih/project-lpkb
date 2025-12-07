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
        Schema::create('institution_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // Institution Identity
            $table->string('responsible_person_name');
            $table->string('institution_name');
            $table->string('institution_head_name');
            // $table->string('education_path');
            $table->string('organizing_body_name');
            $table->string('institution_phone');
            $table->date('establishment_date');
            // $table->string('buddhist_education_type');
            $table->text('organizing_body_address');

            // Documents (files)
            $table->string('registration_certificate_document')->nullable();
            $table->string('articles_of_association_document')->nullable();

            // Institution Address
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('village');
            $table->text('institution_full_address');

            // Photos (Sarana & Prasarana)
            $table->string('facility_photo')->nullable();
            $table->string('front_building_photo')->nullable();
            $table->string('side_building_photo')->nullable();

            // Additional Optional Photos
            $table->string('facility_photo_extra')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_profiles');
    }
};
