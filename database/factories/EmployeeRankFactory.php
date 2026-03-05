<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Employee\Models\Employee;
use App\Modules\Rank\Models\EmployeeRank;
use App\Modules\Rank\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeeRank>
 */
final class EmployeeRankFactory extends Factory
{
    protected $model = EmployeeRank::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'rank_id' => fake()->randomElement(Rank::query()->pluck('id')->toArray()),
            'start_date' => $start_date = fake()->dateTime(),
            'end_date' => fake()->dateTimeBetween($start_date, '+ 3 years'),
        ];
    }
}
