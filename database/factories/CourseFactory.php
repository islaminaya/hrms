<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Course\Models\Course;
use App\Modules\Course\Models\CourseType;
use App\Modules\Employee\Models\Employee;
use App\Modules\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
final class CourseFactory extends Factory
{
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'course_name' => fake()->words(asText: true),
            'course_type_id' => fake()->randomElement(CourseType::query()->pluck('id')->toArray()),
            'issuer' => fake()->company(),
            'awarding_year' => fake()->year(),
            'course_period' => fake()->word(),
            'city' => fake()->city(),
            'country_id' => fake()->randomElement(Country::query()->pluck('id')->toArray()),
        ];
    }
}
