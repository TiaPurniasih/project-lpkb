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
            $table->longText('docs_1')->after('photo_4')->nullable(); // default User
            $table->longText('docs_2')->after('docs_1')->nullable(); // default User
            $table->longText('docs_3')->after('docs_2')->nullable(); // default User
            $table->longText('docs_4')->after('docs_3')->nullable(); // default User
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('docs_1');
            $table->dropColumn('docs_2');
            $table->dropColumn('docs_3');
            $table->dropColumn('docs_4');
        });
    }
};
