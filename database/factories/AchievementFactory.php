<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Achievement\Models\Achievement;
use App\Modules\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Achievement>
 */
final class AchievementFactory extends Factory
{
    protected $model = Achievement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'achievement_title' => fake()->sentence(),
            'achievement_year' => fake()->year(),
        ];
    }
}
