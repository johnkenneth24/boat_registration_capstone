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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // id of user from users table
            $table->foreignId('owner_id')->constrained('owner_infos')->cascadeOnDelete(); // id of owner from owner-infos table
            $table->string('boat_type');
            $table->string('vessel_name');
            $table->string('color');
            $table->string('length');
            $table->string('breadth');
            $table->string('depth');
            $table->string('body_number');
            $table->string('materials');
            $table->string('year_built');
            $table->string('gross_tonnage');
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
