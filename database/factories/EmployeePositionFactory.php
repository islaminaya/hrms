<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Employee\Models\Employee;
use App\Modules\Position\Models\EmployeePosition;
use App\Modules\Position\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeePosition>
 */
final class EmployeePositionFactory extends Factory
{
    protected $model = EmployeePosition::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'position_id' => fake()->randomElement(Position::query()->pluck('id')->toArray()),
            'start_date' => $start_date = fake()->dateTime(),
            'end_date' => fake()->randomElement([null, fake()->dateTimeBetween($start_date, '+ 2 years')]),
        ];
    }
}
