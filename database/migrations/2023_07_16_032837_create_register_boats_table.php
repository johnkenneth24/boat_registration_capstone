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
        Schema::create('register_boats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('registration_no')->unique();
            $table->date('registration_date');
            $table->string('registration_type');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('lastname');
            $table->string('suffix')->nullable();
            $table->string('address');
            $table->string('resident_since');
            $table->string('nationality');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('contact_no');
            $table->string('birthdate');
            $table->integer('age');
            $table->string('birthplace');
            $table->string('educational_background');
            $table->string('children_count')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_no');
            $table->string('emergency_contact_address');
            $table->string('emergency_contact_relationship');
            $table->string('source_of_income')->nullable();
            $table->string('other_source')->nullable();
            $table->string('org_name')->nullable();
            $table->string('member_since')->nullable();
            $table->string('position')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_boats');
    }
};
