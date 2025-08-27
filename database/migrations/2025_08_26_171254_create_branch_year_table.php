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
        Schema::create('branch_year', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->year('year');
            $table->integer('sanctioned_intake');
            $table->timestamps();
        });

        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('sanctioned_intake');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_year');

        Schema::table('branches', function (Blueprint $table) {
            $table->integer('sanctioned_intake')->after('name');
        });
    }
};