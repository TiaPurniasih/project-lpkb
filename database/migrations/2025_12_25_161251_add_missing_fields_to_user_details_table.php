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
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('institution_head_name')->nullable()->after('institution_name');
            $table->string('organizing_body_name')->nullable()->after('institution_head_name');
            $table->text('organizing_body_address')->nullable()->after('organizing_body_name');
            $table->text('institution_full_address')->nullable()->after('institution_phone');
            $table->string('bank_name')->nullable()->after('bank_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
             $table->dropColumn([
                'institution_head_name',
                'organizing_body_name',
                'organizing_body_address',
                'institution_full_address',
                'bank_name',
            ]);
        });
    }
};
