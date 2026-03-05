<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Position\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Position>
 */
final class PositionFactory extends Factory
{
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'ar' => fake('ar')->word(),
                'en' => fake()->word(),
            ],
            'code' => fake()->bothify('POS###'),
        ];
    }
}
