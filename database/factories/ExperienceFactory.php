<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Employee\Models\Employee;
use App\Modules\Experience\Models\Experience;
use App\Modules\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Experience>
 */
final class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'position' => fake()->jobTitle(),
            'organization' => fake()->company(),
            'city' => fake()->city(),
            'country_id' => fake()->randomElement(Country::query()->pluck('id')->toArray()),
            'department' => fake()->word(),
            'section' => fake()->word(),
            'start_date' => $start_date = fake()->dateTime(),
            'end_date' => fake()->randomElement([null, fake()->dateTimeBetween($start_date, '+5 years')]),
            'tasks' => fake()->realText(400),
        ];
    }
}
