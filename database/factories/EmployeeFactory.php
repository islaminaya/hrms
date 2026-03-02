<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Employee\Models\Employee;
use App\Modules\Employee\Models\Sponsorship;
use App\Modules\Organization\Enums\DepartmentType;
use App\Modules\Organization\Models\Department;
use App\Modules\Shared\Models\Country;
use App\Modules\Shared\Models\Gender;
use App\Modules\Shared\Models\MaritalStatus;
use App\Modules\Shared\Models\Religion;
use App\Modules\Shared\Models\SpecialNeeds;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
final class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::query()->pluck('id')->toArray()),
            'head_id' => null,

            'first_name_ar' => fake('ar')->firstName(),
            'middle_name_ar' => fake()->randomElement([null, fake('ar')->firstName()]),
            'third_name_ar' => fake()->randomElement([null, fake('ar')->firstName()]),
            'last_name_ar' => fake('ar')->lastName(),

            'first_name_en' => fake()->firstName(),
            'middle_name_en' => fake()->randomElement([null, fake()->firstName()]),
            'third_name_en' => fake()->randomElement([null, fake()->firstName()]),
            'last_name_en' => fake()->lastName(),

            'marital_status_id' => fake()->randomElement([null, ...MaritalStatus::query()->pluck('id')->toArray()]),
            'religion_id' => fake()->randomElement([null, ...Religion::query()->pluck('id')->toArray()]),
            'special_need_id' => fake()->randomElement([null, ...SpecialNeeds::query()->pluck('id')->toArray()]),

            'gender_id' => fake()->randomElement(Gender::query()->pluck('id')->toArray()),
            'sponsorship_id' => fake()->randomElement(Sponsorship::query()->pluck('id')->toArray()),
            'department_id' => fake()->randomElement(Department::query()->where('type', DepartmentType::DEPARTMENT)->pluck('id')->toArray()),
            'nationality_id' => fake()->randomElement(Country::query()->pluck('id')->toArray()),
            'place_or_birth' => fake()->randomElement([null, ...Country::query()->pluck('id')->toArray()]),

            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'image' => fake()->imageUrl(),

            'date_of_birth' => fake()->date(),
            'joining_date' => fake()->date(),
            'leaving_date' => fake()->date(),

            'home_telephone_number' => fake()->randomElement([null, fake()->phoneNumber()]),
            'home_country_identity' => fake()->randomElement([null, fake()->numerify('##########')]),
            'blood_type' => fake()->bloodGroup(),

            'is_active' => fake()->boolean(70),

            'created_by' => fake()->randomElement([null, ...User::query()->pluck('id')->toArray()]),
            'updated_by' => fake()->randomElement([null, ...User::query()->pluck('id')->toArray()]),

        ];
    }
}
