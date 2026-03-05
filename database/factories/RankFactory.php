<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Rank\Enums\RankType;
use App\Modules\Rank\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Rank>
 */
final class RankFactory extends Factory
{
    protected $model = Rank::class;

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
            'type' => fake()->randomElement(array_column(RankType::cases(), 'value')),
            'code' => fake()->bothify('RNK###'),
        ];
    }
}
