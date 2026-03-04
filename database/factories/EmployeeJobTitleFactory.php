<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Employee\Models\Employee;
use App\Modules\JobTitle\Models\EmployeeJobTitle;
use App\Modules\JobTitle\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeeJobTitle>
 */
final class EmployeeJobTitleFactory extends Factory
{
    protected $model = EmployeeJobTitle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'job_title_id' => fake()->randomElement(JobTitle::query()->pluck('id')->toArray()),
            'is_primary' => fake()->boolean(90),
            'start_date' => $start_date = fake()->date(),
            'end_date' => fake()->randomElement([null, fake()->dateTimeBetween($start_date, '+3 years')]),
            'created_by' => fake()->randomElement([null, ...User::query()->pluck('id')->toArray()]),
            'updated_by' => fake()->randomElement([null, ...User::query()->pluck('id')->toArray()]),
        ];
    }
}
