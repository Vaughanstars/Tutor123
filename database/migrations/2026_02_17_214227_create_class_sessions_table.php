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
        Schema::create('class_sessions', function (Blueprint $table) {
            $table->id();
            $table->date('class_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->foreignId('teacher_id')
            ->constrained()
            ->cascadeOnDelete();

            $table->enum('status', ['Upcoming', 'Completed', 'Cancelled'])
            ->default('Upcoming');

            $table->string('class_link')->nullable();

            $table->timestamps();
        });

    // Pivot table for many-to-many (classes ↔ students)
        Schema::create('class_session_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_session_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_sessions');
    }
};
