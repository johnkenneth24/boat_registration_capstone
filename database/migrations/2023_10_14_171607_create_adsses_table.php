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
        Schema::create('adsses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_info_id')->references('id')->on('owner_infos')->onDelete('cascade');
            $table->string('spouse_name');
            $table->string('number_dependent');
            $table->string('employer_name');
            $table->string('desired_coverage');
            $table->string('premium');
            $table->date('cover_from');
            $table->date('cover_to');
            $table->string('primary_beneficiary')->nullable();
            $table->string('primary_relationship')->nullable();
            $table->string('secondary_beneficiary')->nullable();
            $table->string('secondary_relationship')->nullable();
            $table->string('minor_trustee')->nullable();
            $table->string('pcic_coverage')->nullable();
            $table->string('pcic_name')->nullable();
            $table->string('pcic_relationship')->nullable();
            $table->string('pcic_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adsses');
    }
};
