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
        Schema::table('boats', function (Blueprint $table) {
            $table->string('home_port');
            $table->string('place_built');
            $table->string('engine_make')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('tonnage_length');
            $table->string('tonnage_breadth');
            $table->string('tonnage_depth');
            $table->string('net_tonnage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boats', function (Blueprint $table) {
            $table->dropColumn('home_port');
            $table->dropColumn('place_built');
            $table->dropColumn('engine_make');
            $table->dropColumn('serial_number');
            $table->dropColumn('tonnage_length');
            $table->dropColumn('tonnage_breadth');
            $table->dropColumn('tonnage_depth');
            $table->dropColumn('net_tonnage');
        });
    }
};
