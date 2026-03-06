<?php

declare(strict_types=1);

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
        Schema::create('courses', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->string('course_name')->nullable();
            $table->foreignId('course_type_id')->nullable()->constrained(table: 'course_types');
            $table->string('issuer')->nullable();
            $table->year('awarding_year')->nullable();
            $table->string('course_period')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
