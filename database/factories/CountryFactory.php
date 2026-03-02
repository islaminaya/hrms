<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Country>
 */
final class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => fake()->country(),
                'ar' => fake('ar')->country(),
            ],
            'code' => fake()->unique()->countryCode(),
            'order' => fake()->numberBetween(1, 100),
            'lang' => 'en',
            'is_active' => fake()->boolean(),
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
