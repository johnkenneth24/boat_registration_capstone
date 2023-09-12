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
        Schema::table('register_boats', function (Blueprint $table) {
            $table->foreignId('owner_info_id')->nullable()->constrained('owner_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_boats', function (Blueprint $table) {
            $table->dropForeign(['owner_info_id']);
            $table->dropColumn('owner_info_id');
        });
    }
};
