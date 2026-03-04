<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\JobTitle\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobTitle>
 */
final class JobTitleFactory extends Factory
{
    protected $model = JobTitle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => fake()->jobTitle(),
                'ar' => fake('ar')->jobTitle(),
            ],
            'code' => fake()->unique()->bothify('JOB-###'),
        ];
    }
}
