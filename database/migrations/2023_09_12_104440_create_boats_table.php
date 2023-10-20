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
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('owner_id')->references('id')->on('owner_infos')->onDelete('cascade');
            $table->foreignId('register_boat_id')->nullable()->constrained('register_boats')->onDelete('cascade');
            $table->string('boat_type');
            $table->string('image')->nullable();
            $table->string('vessel_name')->unique();
            $table->string('color');
            $table->string('length');
            $table->string('breadth');
            $table->string('depth');
            $table->string('body_number');
            $table->string('horsepower')->nullable();
            $table->string('materials');
            $table->string('year_built');
            $table->string('gross_tonnage');
            $table->string('home_port');
            $table->string('place_built');
            $table->string('engine_make')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('tonnage_length');
            $table->string('tonnage_breadth');
            $table->string('tonnage_depth');
            $table->string('net_tonnage');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boats');
    }
};
