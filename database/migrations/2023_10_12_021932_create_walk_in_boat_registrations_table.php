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
        Schema::create('walk_in_boat_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('walkin_owner_id')->references('id')->on('walk_in_boat_owners')->onDelete('cascade');
            $table->string('registration_no')->unique();
            $table->date('registration_date');
            $table->string('registration_type');
            $table->string('vessel_name')->unique();
            $table->string('vessel_type');
            $table->string('home_port');
            $table->string('place_built');
            $table->string('year_built');
            $table->string('body_number');
            $table->string('color');
            $table->string('materials');
            $table->string('length');
            $table->string('breadth');
            $table->string('depth');
            $table->string('tonnage_length');
            $table->string('tonnage_breadth');
            $table->string('tonnage_depth');
            $table->string('net_tonnage');
            $table->string('gross_tonnage');
            $table->string('image')->nullable();
            $table->string('horsepower')->nullable();
            $table->string('engine_make')->nullable(); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walk_in_boat_registrations');
    }
};
