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
        Schema::create('employees', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('head_id')->nullable()->constrained('employees');

            $table->string('first_name_ar');
            $table->string('middle_name_ar')->nullable();
            $table->string('third_name_ar')->nullable();
            $table->string('last_name_ar');

            $table->string('first_name_en');
            $table->string('middle_name_en')->nullable();
            $table->string('third_name_en')->nullable();
            $table->string('last_name_en');

            $table->foreignId('marital_status_id')->nullable()->constrained('marital_statuses');
            $table->foreignId('religion_id')->nullable()->constrained('religions');
            $table->foreignId('special_need_id')->nullable()->constrained('special_needs');

            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('sponsorship_id')->constrained('sponsorships');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('nationality_id')->constrained('countries');
            $table->foreignId('place_or_birth')->nullable()->constrained('countries');
            $table->foreignId('sponshorship_id')->constrained('sponsorships');

            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('leaving_date')->nullable();

            $table->string('home_telephone_number')->nullable();
            $table->string('home_country_identity')->nullable();
            $table->string('blood_type')->nullable();

            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('employees');
    }
};
