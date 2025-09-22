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
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->id('faculty_id');
            $table->foreignId('program_id')->constrained('programs', 'program_id');
            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('position_th');
            $table->string('position_en')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('biography_th')->nullable();
            $table->text('biography_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_members');
    }
};
