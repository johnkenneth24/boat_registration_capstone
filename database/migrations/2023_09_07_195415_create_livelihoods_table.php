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
        Schema::create('livelihoods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('owner_info_id')->constrained();
            $table->string('source_of_income')->nullable();
            $table->string('gear_used')->nullable();
            $table->string('culture_method')->nullable();
            $table->string('specify')->nullable();
            $table->string('other_income_sources')->nullable();
            $table->string('gear_used_os')->nullable();
            $table->string('culture_method_os')->nullable();
            $table->string('specify_os')->nullable();
            $table->string('org_name')->nullable();
            $table->string('member_since')->nullable();
            $table->string('position')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livelihoods');
    }
};
