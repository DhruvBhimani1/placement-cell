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
    Schema::create('placements', function (Blueprint $table) {
        $table->id();
        $table->string('student_name');
        $table->string('company');
        $table->decimal('package', 8, 2); // Example: 6.50 LPA
        $table->enum('branch', [
            'Computer Engineering',
            'Information Technology',
            'Electronics & Communication Engineering',
            'Mechanical Engineering',
            'Civil Engineering',
            'Production Engineering',
            'Information and Communication Technology',
            'Electronics and Instrumentation Engineering',
        ]);
        $table->year('year');
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placements');
    }
};
