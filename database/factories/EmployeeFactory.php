<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Employee\Models\Employee;
use App\Modules\Shared\Models\MaritalStatus;
use App\Modules\Shared\Models\Religion;
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
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'head_id' => null,

            'first_name_ar' => fake('ar')->firstName(),
            'middle_name_ar' => fake('ar')->firstName(),
            'third_name_ar' => fake('ar')->firstName(),
            'last_name_ar' => fake('ar')->lastName(),

            'first_name_en' => fake()->firstName(),
            'middle_name_en' => fake()->firstName(),
            'third_name_en' => fake()->firstName(),
            'last_name_en' => fake()->lastName(),

            'marital_status_id' => fake()->randomElement([null, ...MaritalStatus::pluck('id')->toArray()]),
            'religion_id' => fake()->randomElement([null, ...Religion::pluck('id')->toArray()]),
            'special_need_id' => null,
        ];
    }
}
