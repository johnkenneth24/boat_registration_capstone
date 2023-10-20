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
        Schema::create('owner_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('address');
            $table->date('resident_since')->format('Y-m');
            $table->string('nationality');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('contact_no');
            $table->date('birthdate')->format('Y-m-d');
            $table->integer('age');
            $table->string('birthplace');
            $table->string('educ_background');
            $table->string('other_educational_background')->nullable();
            $table->integer('children_count')->nullable();
            $table->string('emContact_person')->nullable();
            $table->string('emRelationship')->nullable();
            $table->string('emContact_no')->nullable();
            $table->string('emAddress')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_infos');
    }
};
